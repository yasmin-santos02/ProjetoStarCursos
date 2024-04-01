<?php

namespace App\Http\Controllers;

use IlluminateHttpRequest;
use AppPayment;
use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use App\Models\Pagamento;
use Exception;
use Illuminate\Http\Response;
use Omnipay\Common\Message\AbstractResponse;

use Omnipay\Omnipay;

class PagamentoController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');

        $this->gateway->initialize([
            'clientId' => env('PAYPAL_CLIENT_ID'),
            'secret' => env('PAYPAL_CLIENT_SECRET'),
            'testMode' => true, // Defina como 'false' quando estiver em produção
        ]);
    }

    public function index()
    {
        return view('pagamento');
    }

    public function charge(Request $request)
    {
        if ($request->input('submit')) {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('paymentsuccess'),
                    'cancelUrl' => url('paymenterror'),
                ))->send();

                // Verificar se a resposta é uma instância de AbstractResponse
                if ($response instanceof AbstractResponse) {
                    if ($response->isRedirect()) {
                        return $response->getRedirectResponse();
                    } else {
                        return $response->getMessage();
                    }
                } else {
                    return $response;
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }


    public function payment_success(Request $request)
{
    if ($request->input('paymentId') && $request->input('PayerID')) {
        $transaction = $this->gateway->completePurchase(array(
            'payer_id'             => $request->input('PayerID'),
            'transactionReference' => $request->input('paymentId'),
        ));
        $response = $transaction->send();

        if ($response->isSuccessful()) {
            
            $arr_body = $response->getData();

            $isPaymentExist = Pagamento::where('payment_id', $arr_body['id'])->first();

            if (!$isPaymentExist) {
                $payment = new Pagamento;
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();
                  }

            return redirect()->route('listagemInscricoes.filtrar')->with('sucess', 'Pago com sucesso.');
        } else {
            return $response->getMessage();
        }
    } else {
        return 'Transação foi recusada';
    }
}

    public function payment_error()
    {
        return 'User is canceled the payment.';
    }
}

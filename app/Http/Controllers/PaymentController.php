<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\ShippingAddress;

class PaymentController extends Controller
{
    public function index(Request $req)
    {
        return view('payment.index');
    }
    //Show all plans
    public function getPlans(Request $req)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),// ClientID
                config('services.paypal.client_secret')// ClientSecret
            )
        );

        $params = array('page_size' => '2');
        $planList = Plan::all($params, $apiContext);
        return $planList;
    }
    //Show plan details
    public function showPlan($id)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),// ClientID
                config('services.paypal.client_secret')// ClientSecret
            )
        );
        $plan = Plan::get($id, $apiContext);//$id must be dynamic from the database
        return $plan;
    }
    //This is for creating plan
    public function createPlan(Request $req)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),// ClientID
                config('services.paypal.client_secret')// ClientSecret
            )
        );

        $plan = new Plan();

        $plan->setName('T-Shirt of the Month Club Plan')
            ->setDescription('Template creation.')
            ->setType('fixed');

        $paymentDefinition = new PaymentDefinition();

        $paymentDefinition->setName('Regular Payments')
            ->setType('REGULAR')
            ->setFrequency('Month')
            ->setFrequencyInterval("2")
            ->setCycles("12")
            ->setAmount(new Currency(array('value' => 100, 'currency' => 'USD')));

        $chargeModel = new ChargeModel();
        $chargeModel->setType('SHIPPING')
            ->setAmount(new Currency(array('value' => 10, 'currency' => 'USD')));

        $paymentDefinition->setChargeModels(array($chargeModel));

        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl("http://localhost:8000/execute-agreement/true")
            ->setCancelUrl("http://localhost:8000/execute-agreement/false")
            ->setAutoBillAmount("yes")
            ->setInitialFailAmountAction("CONTINUE")
            ->setMaxFailAttempts("0")
            ->setSetupFee(new Currency(array('value' => 1, 'currency' => 'USD')));

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        $output = $plan->create($apiContext);
    }
    //This is for creating agreement
    public function createAgreement(Request $req, $id)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),// ClientID
                config('services.paypal.client_secret')// ClientSecret
            )
        );

        $agreement = new Agreement();

        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate('2020-06-18T9:45:04Z');

        $plan = new Plan();
        $plan->setId($id);//Agreement must be on a plan
        $agreement->setPlan($plan);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        $shippingAddress = new ShippingAddress();
        $shippingAddress->setLine1('111 First Street')
            ->setCity('Saratoga')
            ->setState('CA')
            ->setPostalCode('95070')
            ->setCountryCode('US');
        $agreement->setShippingAddress($shippingAddress);

        $agreement = $agreement->create($apiContext);

        $approvalUrl = $agreement->getApprovalLink();

        return redirect($approvalUrl);
    }
    //Activating plan
    public function activate(Request $req, $id)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),// ClientID
                config('services.paypal.client_secret')// ClientSecret
            )
        );

        $createdPlan = $this->showPlan($id);//Fetch plan to activate status

        $patch = new Patch();

        $value = new PayPalModel('{
    	       "state":"ACTIVE"
    	     }');

        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);

        $createdPlan->update($patchRequest, $apiContext);

        $plan = Plan::get($createdPlan->getId(), $apiContext);
        return $plan;
    }
    public function executeAgreement(Request $req, $status)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),// ClientID
                config('services.paypal.client_secret')// ClientSecret
            )
        );

        if($status == 'true'){
            $token = $req->token;
            $agreement = new \PayPal\Api\Agreement();

            $agreement->execute($token, $apiContext);
            return 'done';

        }
        return 'failed';
    }
}

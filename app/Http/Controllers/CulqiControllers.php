<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Culqi\Culqi;
// class CheckotCulqiController extends Controller
// {

	// private $culqi;
    
 //    public function __construct() {
 //    	$this->culqi = new Culqi\Culqi(array('api_key' => config('app.culqi_secret_key')));
 //    	parent::__construct();
 //    }

    $SECRET_KEY = config('app.culqi_secret_key');
	$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  //   public function customer( Request $request ) {
  //   	// cliente
		// $customer = $culqi->Customers->create(
		//   array(
		//     "address" => "av lima 123",
		//     "address_city" => "lima",
		//     "country_code" => "PE",
		//     "email" => "www@".uniqid()."me.com",
		//     "first_name" => "Will",
		//     "last_name" => "Muro",
		//     "metadata" => array("test"=>"test"),
		//     "phone_number" => 899898999
		//   )
		// );
		// print_r($customer);
  //   }

  //   public function cards (Request $request) {
  //   	// tarjeta
		// $card = $culqi->Cards->create(
		//   array(
		//     "customer_id" => "{customer_id}",
		//     "token_id" => "{token_id}"
		//   )
		// );
		// print_r($card);
  //   }

    public function charge( Request $request ) {
		// cargo
		$charge = $this->culqi->Charge->create(
			array(
		      "amount" => 200,
		      "capture" => true,
		      "currency_code" => "PEN",
		      "description" => $request->get('description'),
		      "email" => $request->get('email'),
		      // "installments" => 0,
		      // "antifraud_details" => array(
		      //     "address" => "Av. Lima 123",
		      //     "address_city" => "LIMA",
		      //     "country_code" => "PE",
		      //     "first_name" => "Will",
		      //     "last_name" => "Muro",
		      //     "phone_number" => "9889678986",
		      // ),
		      "source_id" => $request->get('token')
		    )
		);
		print_r($charge);
    }
// }
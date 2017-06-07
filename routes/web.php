<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('culqi');
});

// Route::post('/cargo', function () {
	

// 	$SECRET_KEY = "sk_test_Pu63eYSmOW5uWcQO";
// 	$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
// 	try {
// 		// Creando Cargo a una tarjeta
// 		$charge = $culqi->Charges->create(
// 		  array(
// 		    "amount" => 300,
// 		    "currency_code" => "PEN",
// 		    "email" => "prueba1@culqi.com",
// 		    "source_id" => $_POST["token"] ,
// 		    "antifraud_details" => array(
// 		        "address" =>"Calle Narciso de la Colima",
// 		        "address_city"=> "Lima",
// 		        "country_code" => "PE",
// 		        "first_name" => "Liz",
// 		        "last_name" => "Ruelas",
// 		        "phone_number" => 123456789
// 		     )
// 		  )
// 		);
// 		// Response
// 		echo json_encode($charge);
// 	} catch (Exception $e) {
// 		  echo json_encode($e->getMessage());
// 		}
// });

Route::post('cargo', 'CulqiControllers@charge');

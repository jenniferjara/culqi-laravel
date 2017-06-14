<?php

namespace App\Http\Controllers;

use Culqi\Culqi;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class CulqiController extends Controller
{
    public function charge(){
        $SECRET_KEY = config("app.culqi_secret_key");
        $culqi = new Culqi(array("api_key"=>$SECRET_KEY));
        try
        {
            $cargo = $culqi->Charges->create(
                array(
                    "amount" => 100,
                    "currency_code" => "PEN",
                    "description" => "Accesorios",
                    "email" => $_POST["email"],
                    "source_id" => $_POST["token"]
                )
            );

            $cliente = $culqi->Customers->create(
                array(
                    "first_name" => "Richard",
                    "last_name" => "Hendricks",
                    "email" => $_POST["email"],
                    "address" => "San Francisco Bay Area",
                    "address_city" => "Palo Alto",
                    "country_code" => "US",
                    "phone_number" => "6505434800"
                )
            );
            $all = $culqi->Customers->get();

            // $tarjeta = $culqi->Cards->create(
            //     array(
            //         "customer_id" => "",
            //         "token_id" => $_POST["token"]
            //     )
            // );

            return response()->json($cliente);
        }
        catch (\Exception $e) {
            $exceptionCulqi = json_decode($e->getMessage());
            return response()->json($exceptionCulqi);
        }
    }

    public function customer(){
        
    }
}
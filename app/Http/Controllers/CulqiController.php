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
            $cliente = $culqi->Customers->create(
                array(
                    "first_name" => "Carlos",
                    "last_name" => "Martinez",
                    "email" => $_POST["email"],
                    "address" => "San Francisco Bay Area",
                    "address_city" => "Palo Alto",
                    "country_code" => "US",
                    "phone_number" => "678213476"
                )
            );

            $tarjeta = $culqi->Cards->create(
                array(
                    "customer_id" => $cliente->id,
                    "token_id" => $_POST["token"]
                )
            );

            $cargo = $culqi->Charges->create(
                array(
                    "amount" => 100,
                    "currency_code" => "PEN",
                    "description" => "Accesorios",
                    "email" => $_POST["email"],
                    "source_id" => $tarjeta->id
                    // "source_id" => $_POST["token"]
                )
            );
            
            $suscripcion = $culqi->Subscriptions->create(
                array(
                    "card_id" => $tarjeta->id,
                    "plan_id" => "pln_test_8p6DpSRd9tWSAVxD"
                )
            );

            return response()->json($suscripcion);
        }
        catch (\Exception $e) {
            $exceptionCulqi = json_decode($e->getMessage());
            return response()->json($exceptionCulqi);
        }
    }
}
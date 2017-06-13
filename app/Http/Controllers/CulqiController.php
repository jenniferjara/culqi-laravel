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
            return response()->json($cargo);
        }
        catch (\Exception $e) {
            $exceptionCulqi = json_decode($e->getMessage());
            return response()->json($exceptionCulqi);
        }

    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\APILoginRequest;
use Illuminate\Http\Request;
use SoapClient;

class ApiController extends Controller
{
    function login(APILoginRequest $request)
    {
        $loginService = new SoapClient(env('APP_URL').':8000/siiauwebservice.xml');

        $respuesta = $loginService->valida($request->code, $request->nip,'UdGSIIAUWebServiceValidaUsuario');

        dd($respuesta);
    }

    function checkIn(Request $request)
    {

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function session()
    {
        /*Os parametros podem ser setados de duas formas:
            passando um array ou utilizando o put, conforme abaixo:
        */
        session(['name' => 'Fernando']);
        session()->put('lastname', 'Borges');
        Session::put('email', 'fernandoborgesjr@outlook.com');
        Session::put(['cart_product' => 1, 'cart_quantity' => 1, 'price' => 2.5]);
        var_dump(Session::all());
        //Forget para esquecer alguma chave.
        Session::forget('price');
//Com o has é possivel verificar se a chave tem valor. Com o exists é possivel verificar se tem a chave
        echo Session::has('email')
            ? "<p>O email é válido</p>"
            : "<p>O email não é válido</p>";
        var_dump(Session::all());
        Session::save();
    }
}

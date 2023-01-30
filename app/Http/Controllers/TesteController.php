<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //
    public function teste($p1, $p2) {
        // echo "$p1, $p2, são os parametros";

        // return view('site.teste', ['x' => $p1, 'y' => $p2]); //utilizando array associativo
        // return view('site.teste', compact('p1', 'p2')); //compact
        return view('site.teste')->with('p1', $p1)->with('p2', $p2); //Utilizando metodo with
    }
}

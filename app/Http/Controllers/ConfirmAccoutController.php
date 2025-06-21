<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmAccoutController extends Controller
{
    public function confirmAccout($url)
    {
        echo 'Estou aqui: ' . $url;
    }
    
}

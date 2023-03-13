<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function showNew(){
       
        $new = News::where('trangthai',0)->get();
     
        return view('client.index', [
            'new' => $new
        ]);
    }
}

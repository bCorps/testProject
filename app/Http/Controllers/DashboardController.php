<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $userData = Auth::user();
        $data = array(
            'userData' => $userData
        );

        if($userData->sp == 0){
            $secPass = $userData->secPass;
            $data['secPass'] = $secPass->secPass;
        }
        
        return view('dashboard', $data);
    }
}

<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\SecPass;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SecPassHelper extends Controller
{
    protected $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    protected $secPass;
    protected $length;

    public function __construct ($length = 0) {
        if($length == 0){
            $this->length = 10;
        }
        $this->secPass = new SecPass;
    }

    public function createNewSecPass($id){
        $generatedSecPass = $this->generateSecPass();
        $this->secPass->secPass = $generatedSecPass;
        $this->secPass->userID = $id;
        $this->secPass->save();

        //update user secPass
        // $user = User::find($id);
        // $user->sp = '1';
        // $user->save();

        return $generatedSecPass;
    }

    public function generateSecPass(){
        return substr(str_shuffle($this->str_result), 0, $this->length);
    }
}
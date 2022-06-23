<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecPass extends Model
{
    use Uuid;
    use HasFactory;

    public function validateSecretPass($secretPass, $email){
        return self::select("sec_passes.userID")
                    ->leftJoin('users', 'sec_passes.userID', '=', 'users.id')
                    ->where('users.email', $email)
                    ->where('sec_passes.secPass', $secretPass)
                    ->first();

    }
}

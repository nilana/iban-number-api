<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface
{

    public function saveIban($iban)
    {
        $user = Auth::user();
        $user->iban = $iban;
        $user->save();
    }

    public function getIban()
    {
        return Auth::user()->iban;
    }
}
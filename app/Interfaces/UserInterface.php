<?php

namespace App\Interfaces;

interface UserInterface
{
    public function saveIban($iban);
    public function getIban();

}
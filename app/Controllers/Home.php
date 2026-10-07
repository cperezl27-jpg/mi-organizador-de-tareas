<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        helper('blade');

        return blade('welcome');
    }
}

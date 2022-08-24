<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        $role = session()->get('role');
        if ($role != "2") {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function index()
    {
        return view('user/home');
    }
}

<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        $role = session()->get('role');
        if ($role != "1") {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function index()
    {
        return view('admin/dashboard');
    }
}

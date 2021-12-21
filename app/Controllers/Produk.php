<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PenjualanModel;

class Produk extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Produk'
        );
        return view('produk/view_index', $data);
    }
}
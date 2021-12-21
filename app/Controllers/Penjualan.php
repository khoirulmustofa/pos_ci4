<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PenjualanModel;

class Penjualan extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Penjulan'
        );
        return view('penjualan/view_index', $data);
    }

    public function indexProdukByBarcode()
    {
        $penjualanModel = new PenjualanModel();
        $barcode = $this->request->getPost('search_barcode');
        $produkRow = $penjualanModel->getProdukByBarcode($barcode)->getRow();       
        if ($produkRow) {
            $data_response =  array(
                'status' => true,
                'token_csrf' => csrf_hash(),                
                'data' => $produkRow
            );
        } else {
            $data_response =  array(
                'status' => false,
                'token_csrf' => csrf_hash(),
                'messege'=> '<p>Maaf Data Produk Belum Terdaftar.<br>Silahkan Hubungi Admin</p>'
            );
        }
        
        return $this->response->setJSON($data_response);
    }
}

<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PenjualanModel;

class Penjualan extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Penjualan'
        );
        return view('penjualan/view_index', $data);
    }

    public function indexProdukByBarcode()
    {
        $penjualanModel = new PenjualanModel();
        $barcode = $this->request->getPost('search_barcode');
        // cek produk by barcode
        $produkRow = $penjualanModel->getProdukByBarcode($barcode)->getRow();
        if ($produkRow) {
            // insert cart
            $cart = cart();
            $data = array(
                'id' => $produkRow->produk_id,
                'qty' => 1,
                'price' => $produkRow->harga_jual,
                'name' => $produkRow->produk_name,
                'produk_id' => $produkRow->produk_id,
                'harga_beli' => $produkRow->harga_beli,
            );
            $cart->insert($data);
            $data_response =  array(
                'status' => true,
                'token_csrf' => csrf_hash(),
                'messege' => '<p>Berhasil Menambah Barang ' . $produkRow->produk_name . ' Degan Jumlah</p>'
            );
        } else {
            $data_response =  array(
                'status' => false,
                'token_csrf' => csrf_hash(),
                'messege' => '<p>Maaf Data Produk Belum Terdaftar.<br>Silahkan Hubungi Admin</p>'
            );
        }

        return $this->response->setJSON($data_response);
    }

    public function indexCartShow()
    {
        $output = '';
        $no = 0;
        $cart = cart();
        foreach ($cart->contents() as $items) {
            $no++;
            $output .= '<tr>
                            <td>' . $no . '</td>
                            <td>' . $items['name'] . '</td>
                            <td>' . $items['qty'] .$items['produk_id']. '</td>
                            <td>' . number_format($items['price']) . '</td>
                            <td>' . number_format($items['subtotal']) . '</td>
                            <td>
                                <button type="button" onclick="btn_edit(' . "'" . $items['rowid'] . "'" . ',' . "'" . $items['name'] . "'" . ',' . "'" . $items['qty'] . "'" . ')" class="btn bg-gradient-info btn-sm"><i class="fas fa-edit"></i></button>
                                <button type="button" onclick="btn_delete(' . "'" . $items['rowid'] . "'" . ')" class="btn bg-gradient-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>';
        }
        $output .= '<tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th colspan="2">Rp ' . number_format($cart->total()) . '</th>
                    </tr>';
        $data_response = array(
            'status' => true,
            'token_csrf' => csrf_hash(),
            'cart_belanja' => $output,
            'total_item' => $cart->totalItems(),
            'total_bayar' => number_format($cart->total())
        );

        return $this->response->setJSON($data_response);
    }

    public function indexCartDelete()
    {
        $rowid = $this->request->getPost('rowid');
        $cart = cart();
        $cart->remove($rowid);
        $data_response = array(
            'status' => true,
            'token_csrf' => csrf_hash(),
            'messege' => '<p>Berhasil Delete Item Cart Belanja</p>'
        );

        return $this->response->setJSON($data_response);
    }

    public function indexBayar()
    {
        $cart = cart();
        foreach ($cart->contents() as $items){
            
        }
    }    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Cart;
use Session;


class TransaksiController extends Controller
{
    public function index(){
        $data['barang'] = Barang::get();

        return view('barang', compact('data'));
    }

    public function add_cart($id){
        $data_barang = Barang::where('id', $id)->first();
        $items=array(
            'id' => $id,
            'nama_barang' => $data_barang->nama_barang,
            'harga' => $data_barang->harga,
            'qty' => 1,
        );
        Cart::add($items);
        return redirect('barang');
    }

    public function clear_all(){
        Cart::clear();
        
        return redirect('barang');
    }

    public function simpan_cart(){
        $data = array(
            'tgl_transaksi' => date('Y-m-d'),
            'id_user' => Session::get('id'),
            'total' => 0
        );

        $simpan = Transaksi::insert($data);
        if($simpan){
            $detail = Transaksi::where('id_user', Session::get('id'))->orderBy('id', 'desc')->first();
            foreach(Cart::getContent() as $cart){
                $data_cart = array(
                    'id' => $detail->id,
                    'id_barang' => $cart->id,
                    'qty' => $cart->qty,
                    'subtotal' => $cart->qty*$cart->harga
                );
                DetailTransaksi::insert($data_cart);
            }

            $data = array(
                'total' => Cart::getTotal()
            );

            Transaksi::where('id', $detail->id)->update($data);
            Cart::clear();
        }

        return redirect('barang');
    }

    public function hapus_item(){
        Cart::remove($id_barang);
        return redirect('barang');
    }
}

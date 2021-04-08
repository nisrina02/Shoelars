<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Session;
use Carbon\Carbon;


class TransaksiController extends Controller
{
    public function __construct(){
        $this->middleware('cek_login');
    }

    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('Transaksi.transaksi', compact('barang'));
    }

    public function transaksi(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();

        $tgl = Carbon::now();

        if($request->qty > $barang->stok){
            return redirect('transaksi/'.$id);
        }

        $cek = Transaksi::where('id_user', Session::get('id'))->first();

        if(empty($cek)){
            $transaksi = new Transaksi;
            $transaksi->id_user = Session::get('id');
            $transaksi->tgl_transaksi = $tgl;
            $transaksi->total = 0;
            $transaksi->save();
        }
        $transaksi_baru = Transaksi::where('id_user', Session::get('id'))->first();
        $cek_detail = DetailTransaksi::where('id_barang', $barang->id)->where('id_transaksi', $transaksi_baru->id)->first();

        if(empty($cek_detail)){
            $detail = new DetailTransaksi;
            $detail->id_barang = $barang->id;
            $detail->id_transaksi = $transaksi_baru->id;
            $detail->qty = $request->qty;
            $detail->subtotal = $barang->harga*$request->qty;
            $detail->save();
        } else {
            $detail = DetailTransaksi::where('id_barang', $barang->id)->where('id_transaksi', $transaksi_baru->id)->first();
            $detail->qty = $detail->qty+$request->qty;

            $harga_detail_baru = $barang->harga*$request->qty;
            $detail->qty = $detail->subtotal+$harga_detail_baru;
            $detail->update();
        }

        $transaksi = Transaksi::where('id_user', Session::get('id'))->first();
        $transaksi->total = $transaksi->total+$barang->harga*$request->qty;
        $transaksi->update();

        // alert()->success('Pembelian Berhasil', 'Success');
        return redirect('barang')->with('alert_message', 'Pembelian berhasil dilakukan');
    }
}

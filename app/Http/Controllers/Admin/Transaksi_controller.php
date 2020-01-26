<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Session;
use Uuid;
use Datatables;

class Transaksi_controller extends Controller
{
    public function index(){
    	$title = 'Riwayat Transaksi';

    	return view('admin.transaksi.transaksi_index',compact('title'));
    }

    public function periksa(Request $request){
    	$tgl1 = $request->tgl_awal;
    	$tgl2 = $request->tgl_akhir;
    	$title = 'Transaksi dari tanggal '.date('d-M-Y',strtotime($tgl1)).' sampai tanggal '.date('d-M-Y',strtotime($tgl2));

    	return view('admin.transaksi.transaksi_tanggal',compact('title','tgl1','tgl2'));
    }

    public function yajra(Request $request){
    	$barang = DB::table('sale')->select([
    		'barang_id',
    		'sale_id',
    		'qty',
    		'total',
    		'tanggal'
    	]);

        return Datatables::of($barang)
            ->editColumn('barang_id',function($harga){
                $barang_id = $harga->barang_id;
                $nama = \DB::table('barang')->where('barang_id',$barang_id)->value('nama');
                return $nama;
            })->editColumn('total',function($harga){
                $total = $harga->total;
                return 'Rp. '.number_format($total,0);
            })->editColumn('tanggal',function($e){
                $tanggal = $e->tanggal;
                return date("d-M-Y",strtotime($tanggal));
            })->make(true);
	}

	public function yajra_tanggal(Request $request, $tgl1, $tgl2){
        $tanggal1 = date("Y-m-d", strtotime($tgl1));
        $tanggal2 = date("Y-m-d", strtotime($tgl2));

		$barang = DB::table('sale')->select([
    		'barang_id',
    		'sale_id',
    		'qty',
    		'total',
    		'tanggal'
    	]);

        return Datatables::of($barang)
            ->editColumn('barang_id',function($harga){
                $barang_id = $harga->barang_id;
                $nama = \DB::table('barang')->where('barang_id',$barang_id)->value('nama');
                return $nama;
            })->editColumn('total',function($harga){
                $total = $harga->total;
                return 'Rp. '.number_format($total,0);
            })->editColumn('tanggal',function($e){
                $tanggal = $e->tanggal;
                return date("d-M-Y",strtotime($tanggal));
            })->whereBetween('tanggal',[$tanggal1,$tanggal2])->make(true);
	}
}

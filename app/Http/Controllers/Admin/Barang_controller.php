<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Datatables;
use DB;
use Illuminate\Support\Facades\Input;
use Uuid;

class Barang_controller extends Controller
{
    public function index(){
    	$title = 'Master Barang';

    	return view('admin.barang.barang_index',compact('title','barang'));
    }

    public function store(Request $request){
        $barang_id = Uuid::generate(4);
        $nama = $request->nama;
        $harga_awal = $request->harga_awal;
        $discount = $request->discount;
        $harga_akhir = ($harga_awal) - (($discount / 100) * $harga_awal);
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        \DB::table('barang')->insert([
            'barang_id'=>$barang_id,
            'nama'=>$nama,
            'harga_awal'=>$harga_awal,
            'discount'=>$discount,
            'harga_akhir'=>$harga_akhir,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at
        ]);

        \Session::flash('pesan','Data berhasil ditambahkan');
        return redirect('admin/barang');
    }

    public function update(Request $request,$id){
        $nama = $request->nama;
        $harga_awal = $request->harga_awal;
        $discount = $request->discount;
        $harga_akhir = ($harga_awal) - (($discount / 100) * $harga_awal);
        $updated_at = date("Y-m-d H:i:s");

        \DB::table('barang')->where('barang_id',$id)->update([
            'nama'=>$nama,
            'harga_awal'=>$harga_awal,
            'discount'=>$discount,
            'harga_akhir'=>$harga_akhir,
            'updated_at'=>$updated_at
        ]);

        \Session::flash('pesan','Data berhasil di update');
        return redirect('admin/barang');
    }

    public function getData($id){
        $barang = \DB::table('barang')->where('barang_id',$id)->first();

        return response()->json([
            'nama'=>$barang->nama,
            'harga_awal'=>$barang->harga_awal,
            'discount'=>$barang->discount
        ]);
    }

    public function yajra(Request $request){
    	$barang = DB::table('barang')->select([
    		'barang_id',
    		'nama', 
    		'discount',
    		'harga_awal',
    		'harga_akhir',
    		'created_at', 
    		'updated_at',
    	]);

        return Datatables::of($barang)
            ->addColumn('action', function ($barang) {
                $id = $barang->barang_id;
                return '<a href="#" barang-id="'.$id.'" class="btn btn-xs btn-primary btn-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })->editColumn('harga_awal',function($harga){
                $harga = $harga->harga_awal;
                return 'Rp. '.number_format($harga,0);
            })->editColumn('discount',function($harga){
                $dc = $harga->discount;
                return $dc.'%';
            })->editColumn('harga_akhir',function($e){
                $hrg = $e->harga_akhir;
                return 'Rp. '.number_format($hrg,0);
            })->make(true);
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDF;

class ProdukController extends Controller
{ 
    public function index()
    {
        try {
            $data['produk'] = Produk::orderBy('created_at', 'DESC')->get();
            
            return view('produk.index')->with($data);

        } catch ( QueryException | Exception | PDOException $error) {
            return "terjadi kesalahan ".$error->getMessage();
        }
        
    }
    public function create()
    {
        //
    }

    public function store(StoreProdukRequest $request)
    {
        //error handling
       try {
            DB::beginTransaction();  //mulai transaksi
            Produk::create($request->all()); //query input ke table
            
            DB::commit();  //nyimpan data ke database

            //untuk merefresh ke halaman itu kembali untuk melihat hasil input
            return redirect('produk')->with('success', "Input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            $this->failResponse($error->getMessage(), $error->getCode());
        } 
    }

  
    public function show(Produk $produk)
    {
        //
    }

  
    public function edit(Produk $produk)
    {
        //
    }

    
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
         try {
            DB::beginTransaction();
            $produk->delete();
            DB::commit();
            return redirect('produk')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollback();
            return "terjadi kesalahan ".$error->getMessage();
        }
    }

    public function download(){
        $data['produk'] = Produk::get();
        $pdf = PDF::loadView('produk/data', $data);

        // download PDF file with download method
        $date = date('YMd');
        return $pdf->stream();
        // return $pdf->download($date.'_test.pdf');
    }
}

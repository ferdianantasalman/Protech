<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/order/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nameproduk', $request->name);
        Session::flash('price', $request->price);
        Session::flash('detail', $request->detail);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'detail' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png.gif,svg',
        ], [
            'name.required' => 'Nama wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'price.numeric' => 'Nomor Induk wajib diisi dengan angka',
            'detail.required' => 'Keterangan wajib diisi',
            'image.required' => 'Silahkan masukkan foto',
            'image.mimes' => 'Ekstensi foto hanya boleh jpg, jpeg, png, gif',
        ]);

        $foto_file = $request->file('image');
        $file_name = date('ymdhis') . "." . $foto_file->extension();

        $foto_file->move(public_path('data_file'), $file_name);

        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'detail' => $request->input('detail'),
            'image' => $file_name,
        ];

        Order::create($data);

        return redirect('dev/produk')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
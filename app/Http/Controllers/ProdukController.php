<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id', 'asc')->paginate(3);
        return view('admin/produk/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/produk/create');
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
            'stok' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png.gif,svg',
        ], [
            'name.required' => 'Nama wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'price.numeric' => 'Harga wajib diisi dengan angka',
            'detail.required' => 'Keterangan wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'stok.numeric' => 'Stok wajib diisi dengan angka',
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
            'stok' => $request->input('stok'),
            'image' => $file_name,
        ];

        Product::create($data);

        return redirect('dev/produk')->with('success', 'Data berhasil ditambahkan');
        // return "halo ini produk store $request->name,  $request->price,  $request->detail,  $request->image";
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
        $data = Product::where('id', $id)->first();

        return view('admin/produk/edit')->with('data', $data);
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

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'detail' => 'required',
            'stok' => 'required|numeric',
        ], [
            'name.required' => 'Nama wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'price.numeric' => 'Nomor Induk wajib diisi dengan angka',
            'detail.required' => 'Keterangan wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'stok.numeric' => 'Stok wajib diisi dengan angka',
        ]);

        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'detail' => $request->input('detail'),
            'stok' => $request->input('stok'),
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png.gif,svg',
            ], [
                'image.mimes' => 'Ekstensi foto hanya boleh jpg, jpeg, png, gif, svg',
            ]);

            $foto_file = $request->file('image');
            $file_name = date('ymdhis') . "." . $foto_file->extension();

            $foto_file->move(public_path('data_file'), $file_name);

            $data_foto = Product::where('id', $id)->first();
            File::delete(public_path('data_file') . '/' . $data_foto->image);

            $data = [
                'image' => $file_name
            ];
        };


        Product::where('id', $id)->update($data);

        return redirect('dev/produk')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::where('id', $id)->first();
        File::delete(public_path('date_file') . '/' . $data->image);

        Product::where('id', $id)->delete();
        return redirect('dev/produk')->with('success', 'Data berhasil dihapus');
    }
}
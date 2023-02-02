<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::orderBy('id', 'asc')->paginate(5);
        return view('admin/service/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/service/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nameservis', $request->name);
        Session::flash('price', $request->price);
        Session::flash('detail', $request->detail);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'detail' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'price.numeric' => 'Harga wajib diisi dengan angka',
            'detail.required' => 'Keterangan wajib diisi',
        ]);

        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'detail' => $request->input('detail'),
        ];

        Service::create($data);

        return redirect('dev/servis')->with('success', 'Data berhasil ditambahkan');
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
        $data = Service::where('id', $id)->first();

        return view('admin/service/edit')->with('data', $data);
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
        ], [
            'name.required' => 'Nama wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'price.numeric' => 'Nomor Induk wajib diisi dengan angka',
            'detail.required' => 'Keterangan wajib diisi',
        ]);

        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'detail' => $request->input('detail'),
        ];

        Service::where('id', $id)->update($data);

        return redirect('dev/servis')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id', $id)->delete();
        return redirect('dev/servis')->with('success', 'Data berhasil dihapus');
    }
}
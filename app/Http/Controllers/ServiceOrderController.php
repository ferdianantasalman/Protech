<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Session::get('id');
        $data = ServiceOrder::where('user_id', '=', $query)->get();
        // dd($data);   
        return view('user/service/history', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('user/service/create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Session::flash('nameservis', $request->name);
        // Session::flash('price', $request->price);
        // Session::flash('detail', $request->detail);

        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required|numeric',
            'alamat' => 'required',
            'service' => 'required',
            'jadwal' => 'required',
            'jam' => 'required',
        ]);

        $data = [
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'alamat' => $request->input('alamat'),
            'service' => $request->input('service'),
            'jadwal' => $request->input('jadwal'),
            'jam' => $request->input('jam'),
        ];
        // dd($data);
        ServiceOrder::create($data);

        return redirect('service-order')->with('success', 'Data berhasil ditambahkan');
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
        ServiceOrder::where('id', $id)->delete();
        return redirect('service-order')->with('success', 'Data berhasil dihapus');
    }
}
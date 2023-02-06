<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/index')->with('title', 'Dashboard');
    }

    public function service()
    {
        // $data = DB::table('service_order')->get();
        // return view('admin/service/order', compact('data'));

        $data = ServiceOrder::orderBy('id', 'asc')->get();
        return view('admin/service/order', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('service_order')->where('id', $id)->delete();
        return redirect('dev/service-order')->with('success', 'Data berhasil dihapus');
    }
}

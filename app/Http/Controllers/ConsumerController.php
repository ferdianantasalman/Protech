<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function home()
    {
        $data = Product::orderBy('id', 'asc')->get();
        return view('user/index')->with('data', $data);
    }

    public function servis()
    {
        return view('user/service/index');
    }

    public function book_service()
    {
        $services = Service::all();
        return view('user/service/create', compact('services'));
    }

    public function book_service_action(Request $request)
    {
    }

    public function service_history()
    {
        return view('user/history');
    }
}

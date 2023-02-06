@extends('layout/admin')

@section('content')

<!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                            @include('component/admin/message')                
                        <!-- Examples -->                       
                        <div class="row">
                            @foreach ($data as $item)
                                <div class="col-md-6 col-xl-4">
                                    <div class="card card border border-primary text-center mb-3">
                                        <div class="card-body">
                                            <h3 class="card-title text-bold">{{ $item->user_id }}</h3>
                                            <h5 class="card-title text-primary">Rp. {{ $item->price }}</h5>
                                            <p class="card-text">{{ $item->email }}</p>    
                                            <form class="d-inline" action="{{ url('service-order/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $item->user_id }}" hidden/>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" hidden/>
                                                <input type="text" class="form-control" id="email" name="email" value="{{ $item->email }}" hidden/>
                                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $item->telephone }}" hidden/>
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $item->alamat }}" hidden/>
                                                <input type="text" class="form-control" id="service" name="service" value="{{ $item->service }}" hidden/>
                                                <input type="text" class="form-control" id="jadwal" name="jadwal" value="{{ $item->jadwal }}" hidden/>
                                                <input type="text" class="form-control" id="jam" name="jam" value="{{ $item->jam }}" hidden/>
                                                <input type="text" class="form-control" id="price" name="price" value="{{ $item->price }}" hidden/>
                                                <select name="status" class="select" style="margin-bottom: 2rem;">
                                                    <option value="" selected disabled>{{ $item->status }}</option>
                                                    <option value="proses">proses</option>
                                                    <option value="selesai">selesai</option>
                                                </select>
                                                <button type="submit" class="btn btn-outline-primary text-primary mt-2">Edit</button>
                                            </form>
                                                <a href="/dev/service-order/{{$item->id}}" type="submit" class="btn btn-outline-primary text-primary mt-2" onclick="javascript: return confirm('Apakah anda yakin ingin membatalkan pesanan ini?')">Cancel</a>
                                        </div>
                                    </div>
                                </div>   
                            @endforeach                                                    
                        </div>
                        <!--/ Card layout -->
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
@endsection
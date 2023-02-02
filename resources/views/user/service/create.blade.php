@extends('layout/user')

@section('content')
       <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
{{-- @dd(Session::get('email')) --}}
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-4">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Booking Service</h5>
                    </div>
                    <div class="card-body">
                     @include('component/admin/message')
                      <form method="POST" action="/service-order" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="user_id">User Id</label>
                          <input type="text" class="form-control" id="user_id" name="user_id" value="{{ Session::get('id')}}" >
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="name">Nama</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Tuliskan nama" value="{{ Session::get('name')}}"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Tuliskan email" value="{{ Session::get('email')}}"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="telephone">No Handphone</label>
                          <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Tuliskan nomor handphone"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="alamat">Alamat</label>
                          <textarea id="alamat" name="alamat" class="form-control" placeholder="Masukkan keterangan produk"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="service">Jenis Service</label>
                          <select name="service" class="form-control">
                                <option value="">Pilih jenis service</option>
                                @foreach ($services as $service)
                                <option value="{{$service->name}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="jadwal">Jadwal</label>
                          <input type="date" class="form-control" id="jadwal" name="jadwal" placeholder="Masukkan harga produk"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="jam">Jam</label>
                          <input type="time" class="form-control" id="jam" name="jam" placeholder="Masukkan harga produk"/>
                        </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" href="service-order">Kembali</a>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
                    <!-- / Content -->

            <div class="content-backdrop fade"></div>
        </div>
           
        
        
        <!-- Content wrapper -->
@endsection
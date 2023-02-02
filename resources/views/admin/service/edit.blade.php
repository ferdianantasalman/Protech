@extends('layout/admin')

@section('content')
       <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-4">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit Produk</h5>
                    </div>
                    <div class="card-body">
                     @include('component/admin/message')
                      <form method="POST" action="{{'/dev/servis/'.$data->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="name">Nama</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama produk" value="{{ $data->name }}"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="price">Harga</label>
                          <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga produk" value="{{ $data->price }}"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="detail">Keterangan</label>
                          <textarea id="detail" name="detail" class="form-control" placeholder="Masukkan keterangan produk">{{ $data->detail }}</textarea>
                        </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" href="/dev/servis">Kembali</a>
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
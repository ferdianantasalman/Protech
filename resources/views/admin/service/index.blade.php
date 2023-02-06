@extends('layout/admin')

@section('content')

<!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                            @include('component/admin/message')                
                        <a href="servis/create" class="btn btn-primary mt-2 mb-4">Tambah Data</a>
                        <!-- Examples -->
                        <div class="row mb-5">
                                <div class="card">
                                <div class="table-responsive text-nowrap mb-3 mt-3">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Service</th>
                                            <th>Harga Service</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>Rp. {{ $item->price }}</td>
                                                <td>{{ $item->detail }}</td>
                                                <td>
                                                    <form action="{{ url('dev/servis/'.$item->id) }}" method="POST">
                                                    @csrf
                                                        @method('DELETE')
                                                        <a href="{{ url('dev/servis/'.$item->id.'/edit') }}" class="btn btn-outline-primary text-primary mt-2">Edit </a>
                                                <button type="submit" class="btn btn-outline-primary text-primary mt-2" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        
                        {{-- <div class="row">
                            @foreach ($data as $item)
                                <div class="col-md-6 col-xl-4">
                                    <div class="card card border border-primary text-center mb-3">
                                        <img class="card-img-top" src="{{ url('/data_file/',$item->image)}}" alt="Card image cap" />
                                        <div class="card-body">
                                            <h3 class="card-title text-bold">{{ $item->name }}</h3>
                                            <h5 class="card-title text-primary">Rp. {{ $item->price }}</h5>
                                            <p class="card-text">{{ $item->detail }}</p>
                                            <form class="d-inline" action="{{ url('dev/produk/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ url('dev/produk/'.$item->id.'/edit') }}" class="btn btn-outline-primary text-primary mt-2">Edit </a>
                                                <button type="submit" class="btn btn-outline-primary text-primary mt-2" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>   
                            @endforeach                                                    
                        </div> --}}
                        <!--/ Card layout -->
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
                

@endsection
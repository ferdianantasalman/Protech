@extends('layout/admin')

@section('content')

<!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                            @include('component/admin/message')                
                        <a href="produk/create" class="btn btn-primary mt-2 mb-4">Tambah Data</a>
                        <!-- Examples -->
                        {{-- <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card border border-primary text-center mb-3">
                                    <img class="card-img-top" src="../assets/img/elements/2.jpg" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to
                                            asaasasadadsadasd
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-4">Go somewhere </a>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-4">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card border border-primary text-center mb-3">
                                    <img class="card-img-top" src="../assets/img/elements/2.jpg" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to
                                            asaasasadadsadasd
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-4">Go somewhere </a>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-4">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card border border-primary text-center mb-3">
                                    <img class="card-img-top" src="../assets/img/elements/2.jpg" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to
                                            asaasasadadsadasd
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-4">Go somewhere </a>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-4">Go somewhere</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                <div class="card border border-primary text-center ">
                                    <img class="card-img-top" src="../assets/img/elements/2.jpg" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to
                                            asaasasadadsadasd
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-4">Go somewhere </a>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-4">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
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
                        </div>
                        <!--/ Card layout -->
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
                

@endsection
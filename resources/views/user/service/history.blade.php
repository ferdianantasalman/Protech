@extends('layout/user')

@section('content')

<!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                            @include('component/admin/message')                
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
                        <div class="row mb-5 ms-1 me-1">
                                <div class="card">
                                <div class="table-responsive text-nowrap mb-3 mt-3">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Service</th>
                                            <th>Jadwal</th>
                                            <th>Jam</th>
                                            <th>Harga</th>
                                            <th>Status</th>
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
                                                <td>{{ $item->service }}</td>
                                                <td>{{ $item->jadwal }}</td>
                                                <td>{{ $item->jam }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <form action="{{ url('service-order/'.$item->id) }}" method="POST">
                                                    @csrf
                                                        @method('DELETE')
                                                        {{-- <a href="{{ url('dev/produk/'.$item->id.'/edit') }}" class="btn btn-outline-primary text-primary mt-2">Edit </a> --}}
                                                        <button type="submit" class="btn btn-outline-primary text-primary mt-2" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"">Cancel</button>
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
                
        {{-- <script>
        tambah => () = (){
            Swal.fire({
            title: 'Cancel order servis?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
    }
})
        }
        </script> --}}
@endsection
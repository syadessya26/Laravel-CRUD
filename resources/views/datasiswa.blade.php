@extends('layout.admin')

<!-- Menampilkan Toaster -->
@push('css')
<!-- Bootstrap CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Nilai Siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Nilai Siswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Tabel Siswa -->
    <div class="container">
      <a href="/tambahsiswa" class="btn btn-success mb-3">Tambah Data</a>
      {{-- {{ Session::get('halaman_url')}} --}} 
      <div class="row align-items-center">
          <div class="col-auto">
            <form action="/siswa" method="GET">
            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
            </form>
          </div>
          
          @if (auth()->user()->role == "admin") 
          <div class="col-auto">
            <a href="/exportpdf" class="btn btn-info">Export PDF</a>
          </div>
          @endif <!-- Hanya dapat diakses oleh admin saja -->

          @if (auth()->user()->role == "admin")
          <div class="col-auto">
            <a href="/exportexcel" class="btn btn-success">Export Excel</a>
          </div>
          @endif

          @if (auth()->user()->role == "admin")
          <div class="col-auto">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Import Data
          </button>
          @endif

            </div>
              <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="/importexcel" method="POST" enctype="multipart/form-data">
                          @csrf
                      <div class="modal-body">
                          <div class="forum-group">
                            <input type='file' name='file' required>
                          </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                  </form>
              </div>
            </div>
      </div>
        
    
    
    <div class="row mt-2">
          
          {{--@if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
             {{$message}}
            </div>
          @endif --}}
    
        <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">Absensi</th>
        <th scope="col">NIM</th>
        <th scope="col">Mata Kuliah</th>
        <th scope="col">File</th>
        <th scope="col">Nilai</th>
        <th scope="col">Dibuat</th>
        
        @if (auth()->user()->role == "admin")
        <th scope="col">Aksi</th>
        @endif

        </tr>
    </thead>
    <tbody>
      @php
          $no=1;
      @endphp
    @foreach ( $data as $index => $row )
        <tr>
        <th scope="row">{{$index + $data->firstItem()}}</th>
        <td>{{$row->nama}}</td>
        <td>{{$row->absen}}</td>
        <td>{{$row->nim}}</td>
        <td>{{$row->matkuls->nama}}</td>
        <td>
          {{ $row->file }}
          </td>
        <td>{{$row->nilai}}</td>
        <td>{{$row->created_at->format('D M Y')}}</td>
        
        @if (auth()->user()->role == "admin")
        <td>
            <a href="/tampildata/{{$row->id}}" class="btn btn-info">Edit</a>
            <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->nama}}">Delete</a>
        </td>
        @endif

        </tr>
    @endforeach
    </tbody>
    </table>
    {{ $data->links() }}
    </div>
    </div>

  </div>
</div>

@endsection

@push('scripts')
        
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
      </body>
      <script>

          $('.delete').click( function(){
            var siswaid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
                swal({
                  title: "Yakin?",
                  text: "Apabila data terhapus, anda tidak dapat mengembalikan nama "+nama+"!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location="/delete/"+siswaid+""
                    swal("Poof! Data telah terhapus!", {
                      icon: "success",
                    });
                  } else {
                    swal("Data tidak terhapus!");
                  }
            });
          });
      </script>

    <script>
      @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
      @endif
    </script>
@endpush
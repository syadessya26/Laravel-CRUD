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
            <h1 class="m-0">Data Mata Kuliah FTI</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mata Kuliah FTI</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Tabel Siswa -->
    @if (auth()->user()->role == "admin")
    <div class="container">
      <a href="/tambahmatkul" class="btn btn-success mb-3">Tambah Data</a>
      {{-- {{ Session::get('halaman_url')}} --}} 
    </div>
    @endif
        
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
        <th scope="col">Mata kuliah</th>
        <th scope="col">Kode Matkul</th>
        <th scope="col">Dosen</th>
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
        <td>{{$row->kode_matkul}}</td>
        <td>{{$row->dosen}}</td>
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
      </body>
@endpush
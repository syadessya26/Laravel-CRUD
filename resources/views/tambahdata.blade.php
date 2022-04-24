@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Nilai Siswa</li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="container">
      <div class="row justify-content-center">
          <div class="col-8"> 
              <div class="card">  
                  <div class="card-body">
                          <form action="/insertdata" method="POST" enctype="multipart/form-data">
                              @csrf
                                  <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                          @error('nama')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror   
                                          </div>
                                          <div class="mb-3">
                                                  <label for="exampleInputEmail1" class="form-label">Absensi</label>
                                                  <select class="form-select" name="absen" aria-label="Default select example">
                                                          <option selected>Pilih Kehadiran</option>
                                                          <option value="Hadir">Hadir</option>
                                                          <option value="Tidak Hadir">Tidak Hadir</option>
                                                      </select>
                                          </div>
                                          <div class="mb-3">
                                                  <label for="exampleInputEmail1" class="form-label">NIM</label>
                                                  <input type="number" name="nim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  @error('nim')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                          </div>
                                          <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Matkul</label>
                                                <select class="form-select" name="id_matkuls" aria-label="Default select example">
                                                        <option selected>Pilih Matkul</option>

                                                        @foreach ($datamatkul as $data)
                                                        <option value="{{$data->id}}"> {{$data->nama}} </option>                                                        
                                                        @endforeach

                                                    </select>
                                        </div>

                                        @if (auth()->user()->role == "admin")
                                          <div class="mb-3">
                                                  <label for="exampleInputEmail1" class="form-label">Nilai</label>
                                                  <select class="form-select" name="nilai" aria-label="Default select example">
                                                  <option selected>Nilai</option>
                                                          <option value="-"> - </option>
                                                          <option value="A">A</option>
                                                          <option value="A-">A-</option>
                                                          <option value="B+">B+</option>
                                                          <option value="B">B</option>
                                                          <option value="B-">B-</option>
                                                          <option value="C+">C+</option>
                                                          <option value="C">C</option>
                                                          <option value="C-">C-</option>
                                                  </select>
                                          </div>
                                        @endif

                                        <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Masukan File</label>
                                                <input type="file" name="file" class="form-control">
                                        </div>
                                          <div class="mb-3 form-check">
                                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                  <label class="form-check-label" for="exampleCheck1">Saya menyetujui data yang bersangkutan</label>
                                                </div>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                        </div>
                </div>
                </div>
        </div>
        </div>
        </div>
</div>
    
@endsection
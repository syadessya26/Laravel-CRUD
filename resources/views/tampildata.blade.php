@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Edit Data Siswa</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Data Nilai Siswa</li>
                  <li class="breadcrumb-item active">Edit Data</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->

        <div class="container">
        <div class="row justify-content-center">
            <div class="col-8"> 
                <div class="card">  
                    <div class="card-body">
                            <form action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama}}">
                                            </div>
                                            <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Absensi</label>
                                                    <select class="form-select" name="absen" aria-label="Default select example">
                                                            <option selected>{{$data->absen}}</option>
                                                            <option value="Hadir">Hadir</option>
                                                            <option value="Tidak Hadir">Tidak Hadir</option>
                                                        </select>
                                            </div>
                                            <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                                                    <input type="number" name="nim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nim}}">
                                            </div>
                                            <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nilai</label>
                                                    <select class="form-select" name="nilai" aria-label="Default select example">
                                                    <option selected>{{$data->nilai}}</option>
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
                                            <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Saya menyetujui perubahan data siswa yang bersangkutan</label>
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

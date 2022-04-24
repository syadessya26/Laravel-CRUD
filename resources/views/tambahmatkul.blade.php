@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Mata Kuliah</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mata Kuliah FTI</li>
              <li class="breadcrumb-item active">Tambah Mata Kuliah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="container">
      <div class="row justify-content-center">
          <div class="col-8"> 
              <div class="card">  
                  <div class="card-body">
                          <form action="/insertdatamatkul" method="POST" enctype="multipart/form-data">
                              @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Nama Mata Kuliah</label>
                                          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Kode Mata Kuliah</label>
                                            <input type="number" name="kode_matkul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Dosen</label>
                                            <input type="text" name="dosen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
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
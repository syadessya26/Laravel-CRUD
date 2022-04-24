@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Data Siswa</span>
                <span class="info-box-number">
                  {{$jumlahsiswa}}
                  <small> Orang</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Siswa Hadir</span>
              <span class="info-box-number">{{$jumlahsiswahadir}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Siswa Tidak Hadir</span>
                <span class="info-box-number">{{$jumlahsiswatdk}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Warga FTI</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">ABOUT</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-auto">
                    <p class="text-center">
                      <strong>UAS INTERNET PUBLISHER LANJUTAN</strong>
                    </p>

                    <div class="chart">
                  
                    </div>
                    <p>Pada project kali ini, kami merancang sebuah website CRUD berbasis framework Laravel 8, template AdminLTE, dan MySQL sebagai databasenya yang bertemakan mengenai 
                    CRUD Data Nilai Mahasiswa. Tidak hanya itu, pada website CRUD ini kami juga menggunakan relationship antara tabel Data Nilai dengan Tabel Data Mata kuliah.
                    </p>
                  <p>
                    Kelompok UAS - 7F : <br>
                      1. Dessya Christianita Effendi - 18083000158 <br> 
                      2. Novika Sari  - <br>
                      3. Gusti Sofyanda   - <br>
                      4. Muhammad Iqbal    - <br>
                  </p>
                  </div>                 
                </div>               
              </div>              
            </div>           
          </div>         
        </div> 
        
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">NEWS</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-auto">
                    <p class="text-center">
                      <strong>BERITA TERKINI</strong>
                    </p>

                    <div class="text">
                  
                    </div>
                    <img src="https://unmer.ac.id/wp-content/uploads/2019/04/rektorat.jpg" width="800px" height="400px">
                    <p>
                      Universitas Merdeka Malang, disingkat Unmer Malang, adalah perguruan tinggi swasta terkemuka di Kota Malang 
                      di bawah pengelolaan Yayasan Perguruan Tinggi Merdeka Malang (YPTM) yang saat ini diketuai Kolonel Purn. H. Toegino Sokarno, SE, 
                      yang berdiri sejak 29 Januari 1964. Kampus ini terletak di Jl. Terusan Raya Dieng No. 62-64 Kota Malang.
                      </p>
                  </div>                 
                </div>               
              </div>              
            </div>           
          </div>         
        </div>     

      </div>
    </section> 
  </div>

@endsection

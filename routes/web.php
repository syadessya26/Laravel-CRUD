<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $jumlahsiswa = Student::count();
    $jumlahsiswahadir = Student::where('absen','Hadir')->count();
    $jumlahsiswatdk = Student::where('absen','Tidak Hadir')->count();

    return view('welcome',compact('jumlahsiswa','jumlahsiswahadir','jumlahsiswatdk'));
})->middleware('auth');

Route::group(['middleware'=> ['auth','hakakses:admin,user']], function(){

//data siswa
Route::get('/siswa',[StudentController::class,'index'])->name('siswa');

//data matkul
Route::get('/datamatkul',[MatkulController::class,'index'])->name('datamatkul');

// tambah data
Route::get('/tambahsiswa',[StudentController::class,'tambahsiswa'])->name('tambahsiswa');
Route::post('/insertdata',[StudentController::class,'insertdata'])->name('insertdata');
});

//admin only
Route::group(['middleware'=> ['auth','hakakses:admin']], function(){
//edit data
Route::get('/tampildata/{id}',[StudentController::class,'tampildata'])->name('tampildata');
Route::post('/updatedata/{id}',[StudentController::class,'updatedata'])->name('updatedata');

//delete
Route::get('/delete/{id}',[StudentController::class,'delete'])->name('delete');

//export pdf
Route::get('/exportpdf',[StudentController::class,'exportpdf'])->name('exportpdf');

//export excel
Route::get('/exportexcel',[StudentController::class,'exportexcel'])->name('exportexcel');

//import excel
Route::post('/importexcel',[StudentController::class,'importexcel'])->name('importexcel');

//tambah matkul
Route::get('/tambahmatkul',[MatkulController::class,'create'])->name('tambahmatkul');
Route::post('/insertdatamatkul',[MatkulController::class,'store'])->name('insertdatamatkul');
});

//login
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/loginproses',[LoginController::class,'loginproses'])->name('loginproses');

//register
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/registeruser',[LoginController::class,'registeruser'])->name('registeruser');

//logout
Route::get('/logout',[LoginController::class,'logout'])->name('logout');



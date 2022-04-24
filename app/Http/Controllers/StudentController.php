<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Matkul;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index(Request $request){
        
        if ($request->has('search')){
            $data = Student::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url',request()->fullUrl());
        }else{

        $data = Student::paginate(10); //menampilkan data sejumlah page yang diinginkan
        Session::put('halaman_url',request()->fullUrl()); //menampilkan URL yang sesuai dengan data yang di edit
    }

        return view('datasiswa',compact('data'));
        
    }

    public function tambahsiswa(){
        $datamatkul = Matkul::all();
        return view('tambahdata',compact('datamatkul'));
    }

    public function insertdata(Request $request){
        //dd($request->all());

        $this->validate($request,[
            'nama' => 'required|min:7|max:30',
            'nim' => 'required|min:7|max:20',
        ]);

        $data = Student::create($request->all()); 
        if($request->hasFile('file')){
            $request->file('file')->move('filesiswa/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('siswa')->with('success','Data Berhasil Di Tambahkan!');
    }

    public function tampildata($id){    //mengambil parameter sesuai Id 
        //dd($data);
        $data = Student::find($id);
        return view('tampildata',compact('data'));
    }

    public function updatedata(Request $request, $id){    
        //dd($data);
        $data = Student::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return redirect(session('halaman_url'))->with('success','Data Berhasil Di Update!');
        }
        return redirect()->route('siswa')->with('success','Data Berhasil Di Update!');
    }

    public function delete($id){    //mengambil parameter sesuai Id 
        //dd($data);
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('siswa')->with('success','Data Berhasil Di Hapus!');
    }

    public function exportpdf(){
        $data =Student::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datasiswa-pdf');
        return $pdf->download('datasiswa2022.pdf');
    }

    public function exportexcel(){
        return Excel::download(new StudentExport, 'datasiswa.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('datasiswa', $namafile);

        Excel::import(new StudentImport, \public_path('datasiswa/'.$namafile));
        return \redirect()->back();
    }
}

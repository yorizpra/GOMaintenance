<?php

// namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Admin;
use App\Person;
use App\Lecturer;
use App\Chief;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
       public function indexAdmin()
    {
        if(!Session::get('loginadmin')){
            return redirect('loginadmin')->with('Alert','You must Login');
        } else {
        return view('admin');
        }
        
    }

    public function loginadmin(){
        return view ('/loginadmin');
    }

    public function loginadminPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data=Admin::where('username',$username)->first();
        if($data){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_admin',$data->id_admin);
                Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('jenis_kelamin',$data->jenis_kelamin);
                Session::put('alamat',$data->alamat);
                Session::put('no_telepon',$data->no_telepon);
                

                Session::put('loginadmin',TRUE);
                return redirect('admin');
            }
            else {
                return redirect('loginadmin')->with('alert', 'login ');
            }
        } else {
            return redirect('loginadmin')->with('alert', 'Your Password Incorrect !');
        }
    }

    public function logoutadmin(){
        Session::flush();
        return redirect('/')->with ('alert', 'Your Was Logout');
    }

    public function registeradmin(Request $request){

        $nama= $request->input('nama');
        $username= $request->input('username');
        $password= $request->input('password');
        $jenis_kelamin= $request->input('jenis_kelamin');
        $alamat= $request->input('alamat');
        $no_telepon= $request->input('no_telepon');
       
        return view('registeradmin');
    }
    public function registeradminPost(Request $request){
        $this->validate($request, [

            'nama' => 'required|min:4|unique:admins',
            'username' => 'required|min:4',
            'password' => 'required|min:4',
            'jenis_kelamin' => 'required|min:4',
            'alamat' => 'required|min:4',
            'no_telepon' => 'required|min:4',
        ],
            [
                'required'      => 'Data tidak boleh kosong',
                'min'           => ':attribute :min Data kurang dari batas minimum',
                'max'           => 'Data lebih dari batas maksimal'
            ]
    );
        $data =  new admin();

        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_telepon = $request->no_telepon;
       

        $data->save();
        return redirect('/admins')->with('status', 'Data Admin Berhasil Ditambahkan!');
    }




   
    








        
    public function indexKajur()
    {
        if(!Session::get('loginkajur')){
            return redirect('loginkajur')->with('Alert','You must Login');
        } else {
        return view('dashboard_kajur');
        }
        
    }
    public function loginkajur(){
        return view ('/loginkajur');
    }

    public function loginkajurPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data=Chief::where('username',$username)->first();
        if($data){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_kajur',$data->id_kajur);
                Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('jenis_kelamin',$data->jenis_kelamin);
                Session::put('alamat',$data->alamat);
                Session::put('no_telepon',$data->no_telepon);
                

                Session::put('loginkajur',TRUE);
                return redirect('dashboard_kajur');
            }
            else {
                return redirect('loginkajur')->with('alert', 'login ');
            }
        } else {
            return redirect('loginkajur')->with('alert', 'Your Password Incorrect !');
        }
    }

    public function logoutkajur(){
        Session::flush();
        return redirect('/')->with ('alert', 'Your Was Logout');
    }

    public function registerkajur(Request $request){

        $nama= $request->input('nama');
        $username= $request->input('username');
        $password= $request->input('password');
        $jenis_kelamin= $request->input('jenis_kelamin');
        $alamat= $request->input('alamat');
        $no_telepon= $request->input('no_telepon');
       
        return view('registerkajur')->with('status', 'Data Admin Berhasil Ditambahkan!');
    }
    public function registerkajurPost(Request $request){
        $this->validate($request, [

            'nama' => 'required|min:4|unique:admins',
            'username' => 'required|min:4',
            'password' => 'required|min:4',
            'jenis_kelamin' => 'required|min:4',
            'alamat' => 'required|min:4',
            'no_telepon' => 'required|min:4',
            

        ]);

        $data =  new Chief();

        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_telepon = $request->no_telepon;
       

        $data->save();
        return redirect('/chiefs')->with('status', 'Data Ketua Jurusan Berhasil Ditambahkan!');
    }




















    public function indexMahasiswa()
    {
        if(!Session::get('loginmahasiswa')){
            return redirect('loginmahasiswa')->with('Alert','You must Login');
        } else {
        return view('dashboard_mahasiswa');
        }
        
    }
    public function loginmahasiswa(){
        return view ('/loginmahasiswa');
    }

    public function loginmahasiswaPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data=Person::where('username',$username)->first();
        if($data){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_user',$data->id_user);
                Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('jenis_kelamin',$data->jenis_kelamin);
                Session::put('alamat',$data->alamat);
                Session::put('no_telepon',$data->no_telepon);
                

                Session::put('loginmahasiswa',TRUE);
                return redirect('dashboard_mahasiswa');
            }
            else {
                return redirect('loginmahasiswa')->with('alert', 'login ');
            }
        } else {
            return redirect('loginmahasiswa')->with('alert', 'Your Password Incorrect !');
        }
    }

    public function logoutmahasiswa(){
        Session::flush();
        return redirect('/')->with ('alert', 'Your Was Logout');
    }

    public function registermahasiswa(Request $request){

        $nama= $request->input('nama');
        $username= $request->input('username');
        $password= $request->input('password');
        $jenis_kelamin= $request->input('jenis_kelamin');
        $alamat= $request->input('alamat');
        $no_telepon= $request->input('no_telepon');
       
        return view('registermahasiswa');
    }
    public function registermahasiswaPost(Request $request){
        $this->validate($request, [

            'nama' => 'required|min:4|unique:admins',
            'username' => 'required|min:4',
            'password' => 'required|min:4',
            'jenis_kelamin' => 'required|min:4',
            'alamat' => 'required|min:4',
            'no_telepon' => 'required|min:4',
            

        ]);

        $data =  new Person();

        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_telepon = $request->no_telepon;
       

        $data->save();
        return redirect('/users')->with('status', 'Data Mahasiswa Berhasil Ditambahkan!');
    }
















    public function indexDosen()
    {
        if(!Session::get('logindosen')){
            return redirect('logindosen')->with('Alert','You must Login');
        } else {
        return view('dashboard_dosen');
        }
        
    }
    public function logindosen(){
        return view ('/logindosen');
    }

    public function logindosenPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data=Lecturer::where('username',$username)->first();
        if($data){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_dosen',$data->id_dosen);
                Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('jenis_kelamin',$data->jenis_kelamin);
                Session::put('alamat',$data->alamat);
                Session::put('no_telepon',$data->no_telepon);
                

                Session::put('logindosen',TRUE);
                return redirect('dashboard_dosen');
            }
            else {
                return redirect('logindosen')->with('alert', 'login ');
            }
        } else {
            return redirect('logindosen')->with('alert', 'Your Password Incorrect !');
        }
    }

    public function logoutdosen(){
        Session::flush();
        return redirect('/')->with ('alert', 'Your Was Logout');
    }

    public function registerdosen(Request $request){

        $nama= $request->input('nama');
        $username= $request->input('username');
        $password= $request->input('password');
        $jenis_kelamin= $request->input('jenis_kelamin');
        $alamat= $request->input('alamat');
        $no_telepon= $request->input('no_telepon');
       
        return view('registerdosen');
    }
    public function registerdosenPost(Request $request){
        $this->validate($request, [

            'nama' => 'required|min:4|unique:admins',
            'username' => 'required|min:4',
            'password' => 'required|min:4',
            'jenis_kelamin' => 'required|min:4',
            'alamat' => 'required|min:4',
            'no_telepon' => 'required|min:4',
            

        ]);

        $data =  new Lecturer();

        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_telepon = $request->no_telepon;
       

        $data->save();
        return redirect('/lecturers')->with('status', 'Data Dosen Berhasil Ditambahkan!');
    }
}

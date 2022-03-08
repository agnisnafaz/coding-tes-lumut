<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    //menampilkan account
    public function index()
    {
        # code...
        //mengambil data dari table account
        $account = DB::table('accounts')->get();

        //mengrim data account ke view index
        return view('account', ['accounts' => $account]);
    }

    //menambahkan get account
    public function getcreate()
    {
        //memanggil view tambah
        return view('createaccount');
    }

    //menambahkan get account form
    public function tambah(Request $request)
    {
        // insert data ke table pegawai
        DB::table('accounts')->insert([
            'username' => $request->username,
            'password' => $request->password,
            'name' => $request->name,
            'role' => $request->role
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/account');
    }
}

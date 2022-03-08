<?php

namespace App\Http\Controllers;

use App\Account;
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


    //BACK END//
    //MAAF SAYA BINGUNG JIKA DISURUH BUAT FULL STACK//
    //get account
    public function getindex() //deklarasi fungsi index
    {
        $data['status'] = true; //menampilkam status
        $data['message'] = "Data Account"; //menampilkan pesan
        $data['data'] = DB::select("SELECT * FROM accounts"); //mengambil data account
        return $data; //menampilkan data buku
    }

    //create account
    public function create(request $request)
    {

        $account = new Account(); //inisialisasi atau menciptakan object baru
        $account->username = $request->username; //menset username
        $account->password = $request->get(password); //menset password
        $account->name = $request->name; //menset name
        $account->role = $request->role; //menset role

        $simpan = $account->save(); //menyimpan data buku ke database
        if ($simpan) { //jika penyimpanan berhasil
            $data['status'] = true;
            $data['message'] = "Berhasil Menambahkan Account";
            $data['data'] = $account;
        } else { //jika penyimpanan gagal
            $data['status'] = false;
            $data['message'] = "Gagal Menambahkan Account";
            $data['data'] = null;
        }

        return $data; //menampilkan data (berhasil/tidak)
    }

    //update account
    public function update(Request $request, $username) //deklarasi fungsi update
    {
        $account = Account::find($username); //mengambil data berdasarkan username

        if ($account) { //jika data yang diambil ada maka akan dieksekusi
            //menset nilai yang baru/update
            $account->password = $request->getPassword(password);
            $account->name = $request->name;
            $account->role = $request->role;

            $data['data'] = $account; //menampilkan data account
            $update = $account->update();
            if ($update) { //jika data berhasil diupdate
                $data['status'] = true;
                $data['message'] = "Berhasil di Update";
                $data['data'] = $account;
            } else { //jika gagal update
                $data['status'] = false;
                $data['message'] = "Gagal di Update";
                $data['data'] = null;
            }
        } else { //jika datanya tidak ada
            $data['status'] = false;
            $data['message'] = "Data Tidak Ada";
            $data['data'] = null;
        }
        return $data; //menampilkan data yang berhasil diupdate (berhasil/gagal)
    }

    //delete account
    public function delete($username) //deklarasi fungsi delete
    {
        $account = buku::find($username); //mengambil data account berdasarkan username

        if ($account) { //mengecek apakah data buku ada atau tidak
            $delete = $account->delete(); //menghapus data buku

            if ($delete) { //jika fungsi berhasil dihapus
                $data['status'] = true;
                $data['message'] = "Data Berhasil di Hapus";
                $data['data'] = $account;
            } else { //jika gagal diupdate
                $data['status'] =  false;
                $data['message'] = "Data Gagal di Hapus";
                $data['data'] = null;
            }
        } else { //data yang dihapus tidak ada
            $data['status'] = false;
            $data['message'] = "Data Tidak Ada";
            $data['data'] = null;
        }

        return $data; //menampilkan hasil data yang dihapus (berhasil/tidak)
    }
}

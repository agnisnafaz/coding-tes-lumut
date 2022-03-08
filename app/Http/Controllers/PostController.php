<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //BACK END//
    //MAAF SAYA BINGUNG JIKA DISURUH BUAT FULL STACK//
    //get post
    public function getindex() //deklarasi fungsi index
    {
        $data['status'] = true; //menampilkam status
        $data['message'] = "Data Post"; //menampilkan pesan
        $data['data'] = DB::select("SELECT * FROM post"); //mengambil data post
        return $data; //menampilkan data post
    }

    //create post
    public function create(request $request)
    {

        $post = new Post(); //inisialisasi atau menciptakan object baru
        $post->title = $request->title; //menset title
        $post->content = $request->content; //menset content
        $post->date = $request->date; //menset date
        $post->username = $request->username; //menset username

        $simpan = $post->save(); //menyimpan data buku ke database
        if ($simpan) { //jika penyimpanan berhasil
            $data['status'] = true;
            $data['message'] = "Berhasil Menambahkan Post";
            $data['data'] = $post;
        } else { //jika penyimpanan gagal
            $data['status'] = false;
            $data['message'] = "Gagal Menambahkan Post";
            $data['data'] = null;
        }

        return $data; //menampilkan data (berhasil/tidak)
    }

    //update post
    public function update(Request $request, $id) //deklarasi fungsi update
    {
        $post = Post::find($id); //mengambil data berdasarkan id

        if ($post) { //jika data yang diambil ada maka akan dieksekusi
            //menset nilai yang baru/update
            $post->title = $request->title;
            $post->content = $request->content;
            $post->date = $request->date;
            $post->username = $request->username;

            $data['data'] = $post; //menampilkan data post
            $update = $post->update();
            if ($update) { //jika data berhasil diupdate
                $data['status'] = true;
                $data['message'] = "Berhasil di Update";
                $data['data'] = $post;
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

    //delete id
    public function delete($id) //deklarasi fungsi delete
    {
        $post = Post::find($id); //mengambil data post berdasarkan id

        if ($post) { //mengecek apakah data post ada atau tidak
            $delete = $post->delete(); //menghapus data post

            if ($delete) { //jika fungsi berhasil dihapus
                $data['status'] = true;
                $data['message'] = "Data Berhasil di Hapus";
                $data['data'] = $post;
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

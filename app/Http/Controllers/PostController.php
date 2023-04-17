<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\MadingDesa;
use App\Models\Pengaduan;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' by ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        

        return view('posts',[
            "title" => "Berita Desa" . $title ,
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate(6)->withQueryString(),
            "categories" => Category::all()
        ]);


        
    }


    
    public function berita(){
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' by ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('index',[
            "title" => "Berita Desa" . $title ,
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate(3)->withQueryString(),
            "categories" => Category::all(),
            'mading'=> MadingDesa::all()
        ]);
    }
    public function show(Post $post){
        return view('post',[
            "title"=>"single post",
            "post"=> $post
        ]);
    }

    public function pengaduan(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'prihal' => 'required|max:255',
            'alamat' => 'required|max:255',
            'pesan' => 'required|max:255',
        ]);

        Pengaduan::create($validatedData);

        return redirect('/')->with('success', 'Pengaduan Berhasil Ditambahkan');
    }
    
}

<?php

namespace App\Http\Controllers;

// import model post
use \App\Models\Post;

// return type redirectResponse
use Illuminate\Http\RedirectResponse;

// return type view
use Illuminate\View\View;

// import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Membuat method post
    public function index(): View{
        // get post
        $posts = Post::latest()->paginate(5);

        // render view ke post
        return view('posts.index', compact('posts'));
    }

    public function create(): View{
        // mengarahkan ke page resources/view/posts/create.blade.php
        return view('posts.create');
    }

    // Membuat method store untuk input data ke dalam database
    public function store(Request $request): RedirectResponse{

        // membuat validasi
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // insert data ke dalam database
        Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'content' => $request->content
        ]);

        // redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    // menambahkan method baru dengan nama show untuk menampilkan data berdasarkan id
    public function show(string $id): View{

        // get post by id
        $post = Post::findOrFail($id);

        // render view with post
        return view('posts.show', compact('post'));

    }

    // membuat method baru dengan nama edit untuk get data by id untuk edit
    public function edit(string $id): View{
        // get data by ID
        $post = Post::findOrFail($id);

        // render view with post
        return view('posts.edit', compact('post'));
    }

    // membuat method dengan nama update untuk mengupdate data ke dalam database
    public function update(Request $request, $id): RedirectResponse {

        // membuat validasi terlebih dahulu
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        // get data by id
        $post = Post::findOrFail($id);

        // membuat kondisi untuk memastikan request file bernama image
        if($request->hasFile('image')){
            // upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            // hapus old image
            Storage::delete('public/posts/'.$post->image);

            // update semua data ke Database
            $post->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'content' => $request->content
            ]);

        } else {
            // update tanpa image jika tidak ada request image
            $post->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
        }

        // redirect dan mengarahkan ke index
        return redirect()->route('posts.index')->with(['success'=>'Data Berhasil Diubah']);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
    	$artikels = Artikel::get();
    	return view('artikel.index', ['artikels' => $artikels]);
    }

    public function create()
    {
    	return view('artikel.create');
    }

    public function store(Request $request)
    {
    	$user = Auth::user();
    	$slug = str_replace(' ', '-', $request->judul);
    	$slug = strtolower($slug);

    	$params = [
    		'judul' => $request->judul,
    		'isi' => $request->isi,
    		'slug' => $slug,
    		'tag' => $request->tag,
    		'user_id' => $user->id
    	];

    	Artikel::create($params);

    	return redirect()->route('artikel')->with('success', 'Berhasil membuat artikel baru');
    }

    public function show($id)
    {
    	$artikel = Artikel::find($id);
    	return view('artikel.show', ['artikel' => $artikel]);
    }

    public function edit($id)
    {
    	$artikel = Artikel::find($id);
    	return view('artikel.edit', ['artikel' => $artikel]);
    }

    public function update(Request $request, $id)
    {
    	$artikel = Artikel::where('id', $id)->first();
    	if (is_null($artikel)) {
    		return redirect()->route('artikel')->with('error', 'Artikel tidak dapat ditemukan!');
    	}

    	$user = Auth::user();
    	$slug = str_replace(' ', '-', $request->judul);
    	$slug = strtolower($slug);

    	$params = [
    		'judul' => $request->judul,
    		'isi' => $request->isi,
    		'slug' => $slug,
    		'tag' => $request->tag,
    		'user_id' => $user->id
    	];

    	$artikel->update($params);

    	return redirect()->route('artikel')->with('success', 'Berhasil merubah artikel');
    }

    public function delete($id)
    {
    	$artikel = Artikel::where('id', $id)->first();
    	if (is_null($artikel)) {
    		return redirect()->route('artikel')->with('error', 'Artikel tidak dapat ditemukan!');
    	}

    	$artikel->delete();
		
    	return redirect()->route('artikel')->with('success', 'Berhasil menghapus artikel');    	
    }
}

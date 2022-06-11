<?php

namespace App\Http\Controllers;

use App\Tampilan;
use File;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tampilans = Tampilan::paginate(5);
        return view('tampilan.index',compact('tampilans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tampilan = new Tampilan;
        $tampilan->no = $request->no;
        $tampilan->kategori = $request->kategori;
        if($request->file != null){
            $image_name = 'img_' . time(). '.'. $request->file->extension();
            if(File::exists(public_path('images/gambarSistem/' . $tampilan->file))) {
                File::delete(public_path('images/gambarSistem/' . $tampilan->file));
            }  
            $request->file->move(public_path('images/gambarSistem/'), $image_name);
            $tampilan->file = $image_name;
        } else if($request->file == null && $tampilan->file && file_exists(public_path('images/gambarSistem/' . $tampilan->file))){
            $image_name = $tampilan->file;
        }
        $tampilan->link = $request->link;
        $tampilan->judul = $request->judul;
        $tampilan->save();
   
        return redirect()->route('tampilan.index')
                        ->with('success','Tampilan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tampilan  $tampilan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampilan = \App\tampilan::find($id);
        return view('tampilan.show',compact('tampilan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tampilan  $tampilan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tampilan = \App\tampilan::find($id);
        return view('tampilan.edit',compact('tampilan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tampilan  $tampilan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $tampilan = \App\Tampilan::find($id);
        $tampilan->no = $request->no;
        $tampilan->kategori = $request->kategori;
        if($request->file != null){
            $image_name = 'img_' . time(). '.'. $request->file->extension();
            if(File::exists(public_path('images/gambarSistem/' . $tampilan->file))) {
                File::delete(public_path('images/gambarSistem/' . $tampilan->file));
            }  
            $request->file->move(public_path('images/gambarSistem/'), $image_name);
            $tampilan->file = $image_name;
        } else if($request->file == null && $tampilan->file && file_exists(public_path('images/gambarSistem/' . $tampilan->file))){
            $image_name = $tampilan->file;
        }
        $tampilan->link = $request->link;
        $tampilan->judul = $request->judul;
        $tampilan->save();

        return redirect()->route('tampilan.index')
                        ->with('success','Tampilan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tampilan  $tampilan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tampilan = \App\Tampilan::find($id);
        if(File::exists(public_path('images/gambarSistem/' . $tampilan->file))) {
            File::delete(public_path('images/gambarSistem/' . $tampilan->file));
        }
        $tampilan->delete();
  
        return redirect()->route('tampilan.index')
                        ->with('success','Tampilan berhasil dihapus');
    }
    
    public function cari(Request $request){
        $cari= $request->get('cariTampilan');
        $tampilans = \App\Tampilan::where('judul', 'LIKE', '%' . $cari . '%')
		->orwhere('keterangan', 'like', '%' . $cari . '%')
		->orwhere('kategori', 'like', '%' . $cari . '%')
		->paginate(10);
        
	    return view('tampilan.index', ['tampilans'=>$tampilans]);
    }

    public function filter(Request $request){
        $filter= $request->get('filter');
        if ($filter == 'Semua'){
            $tampilans = Tampilan::paginate(5);
        } else {
            $tampilans = \App\Tampilan::where('kategori', 'LIKE', '%' . $filter . '%')
            ->paginate(10);
        }
        
	    return view('tampilan.index', ['tampilans'=>$tampilans]);
    }
}

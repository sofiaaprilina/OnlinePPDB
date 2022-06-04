<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Pendaftar;
use PDF;
use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $siswas = Siswa::where('berkas', '=', 'Terkonfirmasi')->paginate(5);
        $siswas = \App\Siswa::where('status', '=', 'Lolos')->take(125)->get();
        $daftars = Pendaftar::where('status', '=', 'Belum Konfirmasi')->get();
        $alerts = Siswa::where('berkas', '=', 'Belum Terkonfirmasi')->get();

        return view('seleksi.index',compact('siswas','daftars','alerts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }

    public function cetak(){
        $siswa = Siswa::where('status', '=', 'Lolos')->get();
        // $siswa = Siswa::where('id', $id)->get();
        $pdf = PDF::loadview('seleksi.cetak_pdf',compact('siswa'))->setPaper('letter', 'landscape');
        return $pdf->stream();
    }
}

<?php

namespace Modules\RawatInap\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Bangunan\Entities\Kamar;
use Modules\Bangunan\Entities\Lantai;
use Modules\Dokter\Entities\Dokter;
use Modules\RawatInap\Entities\RawatInap;

class RawatInapController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $nama = Auth::user()->nama;

        $pasien_ranap = RawatInap::with('pasien')->select('*')->whereNull('tanggal_keluar')->orderBy('created_at', 'desc')->get();

        return view('rawatinap::index')
            ->with('nama', $nama)
            ->with('pasiens', $pasien_ranap);
    }

    public function indexKamar()
    {
        $nama = Auth::user()->nama;

        $pasien_ranap = RawatInap::with('pasien')->select('*')->whereNull('tanggal_keluar')->orderBy('tanggal_masuk', 'desc')->get();

        $lantai = Lantai::select('nomor_lantai')->orderBy('lantai.id', 'desc')->pluck('nomor_lantai');

        $kamar = collect(Kamar::select('id', 'nomor_lantai', 'nama_kamar', 'jumlah_maks_pasien')->get());

        $terisi_sekarang = DB::table('rawat_inap')->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))->whereNull('tanggal_keluar')->groupBy('nama_kamar')->get();

        return view('rawatinap::index-ruangan')
            ->with('nama', $nama)
            ->with('pasiens', $pasien_ranap)
            ->with('lantais', $lantai)
            ->with('kamars', $kamar)
            ->with('terisis', $terisi_sekarang);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $dokter = Dokter::orderBy('nama')->get();

        $kamars = Kamar::select('nama_kamar', 'jumlah_maks_pasien')->get();

        $terisi_sekarang = DB::table('rawat_inap')->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))->whereNull('tanggal_keluar')->groupBy('nama_kamar')->get();

        $kamar_kosong = Kamar::select('nama_kamar')->whereNotIn('nama_kamar', RawatInap::select('nama_kamar')->whereNull('tanggal_keluar')->groupBy('nama_kamar')->get()->toArray())->get();

        $kamar_tersedia = [];

        foreach ($kamars as $kamar)
        {
            foreach ($terisi_sekarang as $terisi)
            {
                if(($kamar->nama_kamar == $terisi->nama_kamar) && ($kamar->jumlah_maks_pasien > $terisi->pasien_inap))
                {
                    array_push($kamar_tersedia, $kamar->nama_kamar);
                }
            }
        }

        foreach ($kamar_kosong as $kamar)
        {
            array_push($kamar_tersedia, $kamar->nama_kamar);
        }

        return view('rawatinap::create')
            ->with('dokters', $dokter)
            ->with('kosongs', $kamar_tersedia);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pasien' => 'required',
            'nama_kamar' => 'required',
            'id_dokter_pj' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        $ranap = new RawatInap();
        $ranap->id_pasien = $request->id_pasien;
        $ranap->nama_kamar = $request->nama_kamar;
        $ranap->id_dokter_pj = $request->id_dokter_pj;
        $ranap->tanggal_masuk = $request->tanggal_masuk;
        $ranap->save();

        Session::flash('message', 'Pendaftaran rawat inap berhasil disimpan');

        return redirect()->route('ranap.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $ranap = RawatInap::findorFail($id);

        return view('rawatinap::show')->with('ranap', $ranap);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $ranap = RawatInap::findOrFail($id);

        $dokter = Dokter::orderBy('nama')->get();

        $kamars = Kamar::select('nama_kamar', 'jumlah_maks_pasien')->get();

        $terisi_sekarang = DB::table('rawat_inap')->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))->whereNull('tanggal_keluar')->groupBy('nama_kamar')->get();

        $kamar_kosong = Kamar::select('nama_kamar')->whereNotIn('nama_kamar', RawatInap::select('nama_kamar')->whereNull('tanggal_keluar')->groupBy('nama_kamar')->get()->toArray())->get();

        $kamar_tersedia = [];

        foreach ($kamars as $kamar)
        {
            foreach ($terisi_sekarang as $terisi)
            {
                if(($kamar->nama_kamar == $terisi->nama_kamar) && ($kamar->jumlah_maks_pasien > $terisi->pasien_inap))
                {
                    array_push($kamar_tersedia, $kamar->nama_kamar);
                }
            }
        }

        foreach ($kamar_kosong as $kamar)
        {
            array_push($kamar_tersedia, $kamar->nama_kamar);
        }

        array_push($kamar_tersedia, $ranap->nama_kamar);

        return view('rawatinap::edit')
            ->with('ranap', $ranap)
            ->with('dokters', $dokter)
            ->with('kosongs', $kamar_tersedia);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $ranap = RawatInap::findOrFail($id);

        $this->validate($request, [
            'id_pasien' => 'required',
            'nama_kamar' => 'required',
            'id_dokter_pj' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        $ranap->id_pasien = $request->id_pasien;
        $ranap->nama_kamar  = $request->nama_kamar;
        $ranap->id_dokter_pj = $request->id_dokter_pj;
        $ranap->tanggal_masuk = $request->tanggal_masuk;
        $ranap->save();

        Session::flash('message', 'Perubahan detail rawat inap berhasil disimpan');

        return redirect()->route('ranap.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function showKamar($id)
    {
        $pasien = RawatInap::select('*')->whereNull('tanggal_keluar')->where('nama_kamar', '=', $id)->get();

        return view('rawatinap::showKamar')
            ->with('pasiens', $pasien)
            ->with('kamar', $id);
    }

    public function back()
    {
        return redirect()->route('ranap.index');
    }
}

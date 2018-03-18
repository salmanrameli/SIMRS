<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Bangunan\Entities\Kamar;
use Modules\Bangunan\Entities\Lantai;
use Modules\RawatInap\Entities\RawatInap;

class LoginController extends Controller
{
    public function home()
    {
        if (Auth::check())
        {
            $jabatan = Auth::user()->jabatan_id;

            switch ($jabatan) {
                case '1':
                    return view('login::homepage.administrator')->with('nama', Auth::user()->nama);
                    break;
                case '2':
                    $nama = Auth::user()->nama;

                    $pasien_ranap = RawatInap::with('pasien')->select('*')->whereNull('tanggal_keluar')->orderBy('tanggal_masuk', 'desc')->get();

                    $lantai = Lantai::select('nomor_lantai')->orderBy('lantai.id', 'desc')->pluck('nomor_lantai');

                    $kamar = collect(Kamar::select('id', 'nomor_lantai', 'nama_kamar', 'jumlah_maks_pasien')->get());

                    $terisi_sekarang = DB::table('rawat_inap')->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))->whereNull('tanggal_keluar')->groupBy('nama_kamar')->get();

                    return view('login::homepage.administrasi')
                        ->with('nama', $nama)
                        ->with('pasiens', $pasien_ranap)
                        ->with('lantais', $lantai)
                        ->with('kamars', $kamar)
                        ->with('terisis', $terisi_sekarang);

                    break;
                case '3':
                    return view('login::homepage.kasir')->with('nama', Auth::user()->nama);
                    break;
                default:
                    return view('welcome');
                    break;
            }
        }

        return view('welcome');
    }

    /**
//     * Display a listing of the resource.
//     * @return Response
//     */
//    public function index()
//    {
//        return view('login::index');
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     * @return Response
//     */
//    public function create()
//    {
//        return view('login::create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     * @param  Request $request
//     * @return Response
//     */
//    public function store(Request $request)
//    {
//    }
//
//    /**
//     * Show the specified resource.
//     * @return Response
//     */
//    public function show()
//    {
//        return view('login::show');
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     * @return Response
//     */
//    public function edit()
//    {
//        return view('login::edit');
//    }
//
//    /**
//     * Update the specified resource in storage.
//     * @param  Request $request
//     * @return Response
//     */
//    public function update(Request $request)
//    {
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     * @return Response
//     */
//    public function destroy()
//    {
//    }
}

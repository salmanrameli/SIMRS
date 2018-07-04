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
use Modules\Pasien\Entities\Pasien;
use Modules\RawatInap\Entities\RawatInap;
use Modules\RawatInap\Entities\TanggalKeluarRawatInap;
use Modules\User\Entities\User;

class RawatInapController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkRole:1,2')->except(['showAllRawatInap', 'showDetailRawatInap']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllRawatInap()
    {
        if(Auth::user()->jabatan_id == 4)
        {
            $nama = Auth::user()->nama;

            $ranap = RawatInap::with('pasien')
                ->select('*')
                ->where('id_dokter_pj', '=', Auth::id())
                ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
                ->get();

            return view('rawatinap::index')
                ->with('nama', $nama)
                ->with('ranaps', $ranap);
        }
        
        $nama = Auth::user()->nama;

        $pasien_ranap = RawatInap::with('pasien')
            ->select('*')
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->get();

        return view('rawatinap::index')
            ->with('nama', $nama)
            ->with('pasiens', $pasien_ranap);
    }

    public function indexKamar()
    {
        $nama = Auth::user()->nama;

        $pasien_ranap = RawatInap::with('pasien')
            ->select('*')
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->get();

        $lantai = Lantai::select('nomor_lantai')->orderBy('lantai.id', 'desc')->pluck('nomor_lantai');

        $kamar = collect(Kamar::select('id', 'nomor_lantai', 'nama_kamar', 'jumlah_maks_pasien')->get());

        $terisi_sekarang = DB::table('rawat_inap')
            ->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->groupBy('nama_kamar')
            ->get();

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
    public function createNewRawatInap()
    {
        $dokter = User::where('jabatan_id', '=', '4')->orderBy('nama')->get();

        $petugass = User::where('jabatan_id', '=', '2')->orWhere('jabatan_id', '=', '3')->orderBy('nama')->get();

        $kamars = Kamar::select('nama_kamar', 'jumlah_maks_pasien')->get();

        $terisi_sekarang = DB::table('rawat_inap')
            ->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->groupBy('nama_kamar')
            ->get();

        $kamar_kosong = Kamar::select('nama_kamar')
            ->whereNotIn('nama_kamar', RawatInap::select('nama_kamar')->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())->groupBy('nama_kamar')->get()->toArray())
            ->get();

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
            ->with('petugass', $petugass)
            ->with('kosongs', $kamar_tersedia);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function saveNewRawatInap(Request $request)
    {
        $this->validate($request, [
            'id_rm' => 'required',
            'id_pasien' => 'required',
            'nama_kamar' => 'required',
            'id_dokter_pj' => 'required',
            'dokter_pengirim' => 'required',
            'id_petugas_penerima' => 'required',
            'diagnosa_awal' => 'required',
            'icd_x_diagnosa_awal' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        $terdaftar = Pasien::where('ktp', '=', $request->id_pasien)->first();

        if(!$terdaftar)
        {
            Session::flash('warning', 'Pasien belum terdaftar di rumah sakit. Daftarkan pasien terlebih dahulu.');

            return redirect()->back();
        }

        $id_rm_terdaftar = RawatInap::where('id_rm', '=', $request->id_rm)->first();

        if($id_rm_terdaftar)
        {
            Session::flash('warning', 'Nomor rekam medis sudah terdaftar. Gunakan nomor rekam medis lain.');

            return redirect()->back();
        }

        $rawat_inap = RawatInap::where('id_pasien', '=', $request->id_pasien)->orderBy('id', 'desc')->first();

        if($rawat_inap != null)
        {
            $pasien_sudah_keluar = TanggalKeluarRawatInap::where('id_rm', '=', $rawat_inap->id_rm)->exists();

            if(!$pasien_sudah_keluar)
            {
                Session::flash('warning', 'Pasien masih terdaftar dalam proses rawat inap rumah sakit.');

                return redirect()->back();
            }
        }

        $ranap = new RawatInap();
        $ranap->id_rm = $request->id_rm;
        $ranap->id_pasien = $request->id_pasien;
        $ranap->nama_kamar = $request->nama_kamar;
        $ranap->id_dokter_pj = User::where('id', '=', $request->id_dokter_pj)->value('id');
        $ranap->dokter_pengirim = $request->dokter_pengirim;
        $ranap->id_petugas_penerima = $request->id_petugas_penerima;
        $ranap->diagnosa_awal = $request->diagnosa_awal;
        $ranap->icd_x_diagnosa_awal = $request->icd_x_diagnosa_awal;
        $ranap->diagnosa_sekunder = $request->diagnosa_sekunder;
        $ranap->icd_x_diagnosa_sekunder = $request->icd_x_diagnosa_sekunder;
        $ranap->tanggal_masuk = $request->tanggal_masuk;
        $ranap->save();

        Session::flash('message', 'Pendaftaran rawat inap berhasil dilakukan');

        return redirect()->route('ranap.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showDetailRawatInap($id)
    {
        $ranap = RawatInap::findorFail($id);

        return view('rawatinap::show')->with('ranap', $ranap);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editRawatInap($id)
    {
        $ranap = RawatInap::findOrFail($id);

        $petugass = User::where('jabatan_id', '=', '2')->orWhere('jabatan_id', '=', '3')->orderBy('nama')->get();

        $dokter = User::where('jabatan_id', '=', '4')->orderBy('nama')->get();

        $kamars = Kamar::select('nama_kamar', 'jumlah_maks_pasien')->get();

        $terisi_sekarang = DB::table('rawat_inap')
            ->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->groupBy('nama_kamar')
            ->get();

        $kamar_kosong = Kamar::select('nama_kamar')
            ->whereNotIn('nama_kamar', RawatInap::select('nama_kamar')->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())->groupBy('nama_kamar')->get()->toArray())
            ->get();

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
            ->with('petugass', $petugass)
            ->with('kosongs', $kamar_tersedia);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateRawatInap(Request $request, $id)
    {
        $ranap = RawatInap::findOrFail($id);

        $this->validate($request, [
            'id_rm' => 'required',
            'id_pasien' => 'required',
            'nama_kamar' => 'required',
            'id_dokter_pj' => 'required',
            'dokter_pengirim' => 'required',
            'id_petugas_penerima' => 'required',
            'diagnosa_awal' => 'required',
            'icd_x_diagnosa_awal' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        $ranap->id_rm = $request->id_rm;
        $ranap->id_pasien = $request->id_pasien;
        $ranap->nama_kamar = $request->nama_kamar;
        $ranap->id_dokter_pj = User::where('id', '=', $request->id_dokter_pj)->value('id');
        $ranap->dokter_pengirim = $request->dokter_pengirim;
        $ranap->id_petugas_penerima = $request->id_petugas_penerima;
        $ranap->diagnosa_awal = $request->diagnosa_awal;
        $ranap->icd_x_diagnosa_awal = $request->icd_x_diagnosa_awal;
        $ranap->diagnosa_sekunder = $request->diagnosa_sekunder;
        $ranap->icd_x_diagnosa_sekunder = $request->icd_x_diagnosa_sekunder;
        $ranap->tanggal_masuk = $request->tanggal_masuk;
        $ranap->save();

        Session::flash('message', 'Perubahan detail rawat inap berhasil disimpan.');

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
        $pasien = RawatInap::where('nama_kamar', '=', $id)->get();

        return view('rawatinap::showKamar')
            ->with('pasiens', $pasien)
            ->with('kamar', $id);
    }

    public function back()
    {
        return redirect()->route('ranap.index');
    }
}

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
use Modules\ModulSistem\Entities\ModulSistem;
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

        $id_modul = ModulSistem::where('modul', '=', config('rawatinap.name'))->value('id');

        $this->middleware('userCanAccess:'.$id_modul, ['only' => 'showAllRawatInap']);

        $this->middleware('userCanCreate:'.$id_modul, ['only' => ['createNewRawatInap', 'saveNewRawatInap']]);

        $this->middleware('userCanRead:'.$id_modul, ['only' => ['showDetailRawatInap']]);

        $this->middleware('userCanUpdate:'.$id_modul, ['only' => ['editRawatInap', 'updateRawatInap']]);

        $this->middleware('checkIfAuthorized')->except(['showAllRawatInap']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllRawatInap()
    {
        $nama = Auth::user()->nama;

        if(Auth::user()->isDokter())
        {
            $ranap = RawatInap::with('pasien')
                ->select('*')
                ->where('id_dokter_pj', '=', Auth::id())
                ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
                ->get();

            return view('rawatinap::index')
                ->with('nama', $nama)
                ->with('ranaps', $ranap);
        }

        $ranap = RawatInap::with('pasien')
            ->select('*')
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->get();

        return view('rawatinap::index')
            ->with('nama', $nama)
            ->with('ranaps', $ranap);
    }

    function getKamarKosong($kamars)
    {
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

        return $kamar_tersedia;
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

        $kamar_tersedia = $this->getKamarKosong($kamars);

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
            'tanggal_masuk_ranap' => 'required',
            'estimasi_biaya' => 'required',
            'pembayaran' => 'required',
            'penanggungjawab_pembayaran' => 'required',
            'alamat_penanggungjawab_pembayaran' => 'required',
            'telepon_penanggungjawab_pembayaran' => 'required',
            'hubungan_penanggungjawab' => 'required',
            'id_dokter_pj' => 'required',
            'id_petugas_penerima' => 'required',
            'nama_kamar' => 'required',
        ]);

        $terdaftar = Pasien::where('id_penduduk_pasien', '=', $request->id_pasien[0])->first();

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

        $rawat_inap = RawatInap::where('id_pasien', '=', $request->id_pasien[0])->orderBy('id', 'desc')->first();

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
        $ranap->id_pasien = Pasien::where('id_penduduk_pasien', '=', $request->id_pasien[0])->value('id');
        $ranap->tanggal_masuk = $request->tanggal_masuk_ranap;
        $ranap->alergi_obat = $request->alergi_obat;
        $ranap->estimasi_biaya = 'Rp. ' . $request->estimasi_biaya;
        $ranap->pembayaran = $request->pembayaran;
        if($ranap->pembayaran != 'bayar sendiri')
        {
            if($ranap->pembayaran == 'jaminan')
            {
                $ranap->jaminan = $request->jaminan;
            }
            if($ranap->pembayaran == 'angsuran')
            {
                $ranap->jaminan = "Rp. " . $request->angsuran . ' kali';
            }
            if($ranap->pembayaran == 'bantuan lain')
            {
                $ranap->jaminan = $request->bantuan_lain;
            }
        }
        $ranap->nama_penanggungjawab_pembayaran = $request->penanggungjawab_pembayaran;
        $ranap->alamat_penanggungjawab_pembayaran = $request->alamat_penanggungjawab_pembayaran;
        $ranap->telepon_penanggungjawab_pembayaran = $request->telepon_penanggungjawab_pembayaran;

        if($request->hubungan_penanggungjawab == 'lainnya')
        {
            $ranap->hubungan_penanggungjawab = ucwords($request->hubungan_penanggungjawab_lainnya);
        }
        else
        {
            $ranap->hubungan_penanggungjawab = $request->hubungan_penanggungjawab;
        }
        $ranap->dokter_pengirim = $request->dokter_pengirim;
        $ranap->id_petugas_penerima = $request->id_petugas_penerima;
        $ranap->diagnosa_awal = $request->diagnosa_awal;
        $ranap->icd_x_diagnosa_awal = $request->icd_x_diagnosa_awal;
        $ranap->id_dokter_pj = $request->id_dokter_pj;
        $ranap->diagnosa_sekunder = $request->diagnosa_sekunder;
        $ranap->icd_x_diagnosa_sekunder = $request->icd_x_diagnosa_sekunder;
        $ranap->nama_kamar = $request->nama_kamar;
        $ranap->save();

        Session::flash('message', 'Pendaftaran rawat inap berhasil dilakukan.');

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

        $kamar_tersedia = $this->getKamarKosong($kamars);

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
            'id_petugas_penerima' => 'required',
            'tanggal_masuk_ranap' => 'required'
        ]);

        $ranap->id_rm = $request->id_rm;
        $ranap->id_pasien = $request->id_pasien;
        $ranap->tanggal_masuk = $request->tanggal_masuk_ranap;
        $ranap->alergi_obat = $request->alergi_obat;
        $ranap->estimasi_biaya = 'Rp. ' . $request->estimasi_biaya;
        $ranap->pembayaran = $request->pembayaran;
        if($ranap->pembayaran != 'bayar sendiri')
        {
            if($ranap->pembayaran == 'jaminan')
            {
                $ranap->jaminan = $request->jaminan;
            }
            if($ranap->pembayaran == 'angsuran')
            {
                $ranap->jaminan = "Rp. " . $request->angsuran . ' kali';
            }
            if($ranap->pembayaran == 'bantuan lain')
            {
                $ranap->jaminan = $request->bantuan_lain;
            }
        }
        $ranap->nama_penanggungjawab_pembayaran = $request->penanggungjawab_pembayaran;
        $ranap->alamat_penanggungjawab_pembayaran = $request->alamat_penanggungjawab_pembayaran;
        $ranap->telepon_penanggungjawab_pembayaran = $request->telepon_penanggungjawab_pembayaran;

        if($request->hubungan_penanggungjawab == 'lainnya')
        {
            $ranap->hubungan_penanggungjawab = ucwords($request->hubungan_penanggungjawab_lainnya);
        }
        else
        {
            $ranap->hubungan_penanggungjawab = $request->hubungan_penanggungjawab;
        }
        $ranap->dokter_pengirim = $request->dokter_pengirim;
        $ranap->id_petugas_penerima = $request->id_petugas_penerima;
        $ranap->diagnosa_awal = $request->diagnosa_awal;
        $ranap->icd_x_diagnosa_awal = $request->icd_x_diagnosa_awal;
        $ranap->id_dokter_pj = $request->id_dokter_pj;
        $ranap->diagnosa_sekunder = $request->diagnosa_sekunder;
        $ranap->icd_x_diagnosa_sekunder = $request->icd_x_diagnosa_sekunder;
        $ranap->nama_kamar = $request->nama_kamar;
        $ranap->save();

        Session::flash('message', 'Pengubahan rincian rawat inap berhasil disimpan.');

        return redirect()->route('ranap.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}

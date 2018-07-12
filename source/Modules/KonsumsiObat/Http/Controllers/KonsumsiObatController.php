<?php

namespace Modules\KonsumsiObat\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\KonsumsiObat\Entities\KonsumsiObat;
use Modules\KonsumsiObat\Entities\KonsumsiObatMalam;
use Modules\KonsumsiObat\Entities\KonsumsiObatPagi;
use Modules\KonsumsiObat\Entities\KonsumsiObatSiang;
use Modules\KonsumsiObat\Entities\KonsumsiObatSore;
use Modules\Obat\Entities\Obat;
use Modules\RawatInap\Entities\RawatInap;

class KonsumsiObatController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllKonsumsiObat($id_ranap)
    {
        $ranap = RawatInap::where('id', '=', $id_ranap)->first();

        $obat = KonsumsiObat::with(['obat', 'konsumsi_obat_pagi', 'konsumsi_obat_siang', 'konsumsi_obat_sore', 'konsumsi_obat_malam'])->where('id_ranap', '=', $id_ranap)->get();

        $daftar_obat = Obat::all();

        return view('konsumsiobat::index')
            ->with('ranap', $ranap)
            ->with('obats', $obat)
            ->with('daftars', $daftar_obat);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewKonsumsiObat($id_ranap)
    {
        $ranap = RawatInap::where('id', '=', $id_ranap)->first();

        $obat = Obat::all();

        return view('konsumsiobat::create')
            ->with('ranap', $ranap)
            ->with('obats', $obat);
    }

    public function createNewKonsumsiObatPagi($id_ranap, $id_konsumsi_obat)
    {
        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        $obat = KonsumsiObat::where('id', '=', $id_konsumsi_obat)->first();

        return view('konsumsiobat::create_konsumsi_obat_pagi')
            ->with('obat', $obat)
            ->with('ranap', $ranap);
    }

    public function createNewKonsumsiObatSiang($id_ranap, $id_konsumsi_obat)
    {
        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        $obat = KonsumsiObat::where('id', '=', $id_konsumsi_obat)->first();

        return view('konsumsiobat::create_konsumsi_obat_siang')
            ->with('obat', $obat)
            ->with('ranap', $ranap);
    }

    public function createNewKonsumsiObatSore($id_ranap, $id_konsumsi_obat)
    {
        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        $obat = KonsumsiObat::where('id', '=', $id_konsumsi_obat)->first();

        return view('konsumsiobat::create_konsumsi_obat_sore')
            ->with('obat', $obat)
            ->with('ranap', $ranap);
    }

    public function createNewKonsumsiObatMalam($id_ranap, $id_konsumsi_obat)
    {
        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        $obat = KonsumsiObat::where('id', '=', $id_konsumsi_obat)->first();

        return view('konsumsiobat::create_konsumsi_obat_malam')
            ->with('obat', $obat)
            ->with('ranap', $ranap);
    }

    public function storeRincianKonsumsiObat(Request $request)
    {
        $this->validate($request, [
            'jumlah' => 'required'
        ]);

        $waktu = $request->waktu;

        if($waktu == 'pagi')
        {
            $obat = new KonsumsiObatPagi();
            $obat->id_konsumsi_obat = $request->get('id_obat');
            $obat->jumlah = $request->get('jumlah');
            $obat->id_petugas = Auth::id();
            $obat->save();
        }
        elseif ($waktu == 'siang')
        {
            $obat = new KonsumsiObatSiang();
            $obat->id_konsumsi_obat = $request->get('id_obat');
            $obat->jumlah = $request->get('jumlah');
            $obat->id_petugas = Auth::id();
            $obat->save();
        }
        elseif ($waktu == 'sore')
        {
            $obat = new KonsumsiObatSore();
            $obat->id_konsumsi_obat = $request->get('id_obat');
            $obat->jumlah = $request->get('jumlah');
            $obat->id_petugas = Auth::id();
            $obat->save();
        }
        elseif ($waktu == 'malam')
        {
            $obat = new KonsumsiObatMalam();
            $obat->id_konsumsi_obat = $request->get('id_obat');
            $obat->jumlah = $request->get('jumlah');
            $obat->id_petugas = Auth::id();
            $obat->save();
        }

        Session::flash('message', 'Rincian konsumsi obat berhasil disimpan');

        return redirect()->route('konsumsi_obat.index', $request->get('id_ranap'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function storeKonsumsiObat(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'hari_perawatan' => 'required',
            'id_obat' => 'required',
            'dosis' => 'required',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer'
        ]);

        $konsumsi_obat = new KonsumsiObat();
        $konsumsi_obat->tanggal = $request->get('tanggal');
        $konsumsi_obat->id_ranap = $request->get('id_ranap');
        $konsumsi_obat->hari_perawatan = $request->get('hari_perawatan');
        $konsumsi_obat->id_obat = $request->get('id_obat');
        $konsumsi_obat->dosis = $request->get('dosis');
        $konsumsi_obat->tinggi_badan = $request->get('tinggi_badan');
        $konsumsi_obat->berat_badan = $request->get('berat_badan');
        $konsumsi_obat->save();

        Session::flash('message', 'Konsumsi obat berhasil disimpan');

        return redirect()->route('konsumsi_obat.index', $request->get('id_ranap'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showKonsumsiObat($id_ranap, $id_konsumsi)
    {
        return view('konsumsiobat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editKonsumsiObat($id_ranap, $id_konsumsi)
    {
        return view('konsumsiobat::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateKonsumsiObat(Request $request, $id_ranap)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}

<?php

namespace Modules\Pasien\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Pasien\Entities\Pasien;

class PasienController extends Controller
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
    public function showAllPasien()
    {
        $pasien = Pasien::orderBy('id')->paginate(15);

        return view('pasien::index')->with('pasiens', $pasien);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewPasien()
    {
        return view('pasien::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function saveNewPasien(Request $request)
    {
        $pasien = Pasien::where('id_penduduk_pasien', $request->id_penduduk_pasien)->first();

        if($pasien != null)
        {
            Session::flash('warning', 'ID penduduk pasien sudah terdaftar');

            return redirect()->back();
        }
        else
        {
            $this->validate($request, [
                'id_penduduk_pasien' => 'required',
                'nama' => 'required',
                'jenkel' => 'required',
                'alamat' => 'required',
                'tanggal_lahir' => 'required',
                'telepon' => 'required',
                'agama' => 'required',
                'golongan_darah' => 'required'
            ]);

            $pasien = new Pasien();
            $pasien->id_penduduk_pasien = $request->id_penduduk_pasien;
            $pasien->nama = $request->nama;
            $pasien->jenkel = $request->jenkel;
            $pasien->nama_wali = $request->nama_wali;
            $pasien->alamat = $request->alamat;
            $pasien->tanggal_lahir = $request->tanggal_lahir;
            $pasien->telepon = $request->telepon;
            $pasien->pekerjaan = $request->pekerjaan;
            $pasien->agama = $request->agama;
            $pasien->golongan_darah = $request->golongan_darah;
            $pasien->save();

            Session::flash('message', 'Data pasien berhasil disimpan');

            return redirect()->route('pasien.index');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showDetailPasien($id)
    {
        $pasien = Pasien::findorFail($id);

        return view('pasien::show')->with('pasien', $pasien);

    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editPasien($id)
    {
        $pasien = Pasien::findorFail($id);

        return view('pasien::edit')->with('pasien', $pasien);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updatePasien(Request $request, $id)
    {
        $this->validate($request, [
            'id_penduduk_pasien' => 'required',
            'nama' => 'required',
            'jenkel' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required'
        ]);

        $pasien = Pasien::findorFail($id);
        $pasien->id_penduduk_pasien = $request->id_penduduk_pasien;
        $pasien->nama = $request->nama;
        $pasien->jenkel = $request->jenkel;
        $pasien->nama_wali = $request->nama_wali;
        $pasien->alamat = $request->alamat;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->telepon = $request->telepon;
        $pasien->pekerjaan = $request->pekerjaan;
        $pasien->agama = $request->agama;
        $pasien->golongan_darah = $request->golongan_darah;
        $pasien->save();

        Session::flash('message', 'Rincian pasien berhasil diubah');

        return redirect()->route('pasien.show', $pasien->id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);

        $pasien->delete();

        Session::flash('message', 'Pasien berhasil dihapus');

        return redirect()->route('pasien.index');
    }

    public function cariPasien(Request $request)
    {
        $query = $request->get('query');

        $results = Pasien::where('id_penduduk_pasien', 'like', '%'.$query.'%')->
            orWhere('nama', 'like', '%'.$query.'%')->
            orWhere('tanggal_lahir', 'like', '%'.$query.'%')->
            orWhere('alamat', 'like', '%'.$query.'%')->
            orWhere('telepon', 'like', '%'.$query.'%')->get();

        return view('pasien::hasil_cari')->with('results', $results)->with('query', $query);
    }

    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return Response::json([]);
        }

        $pasiens = Pasien::search($term)->get();

        $formatted_tags = [];

        foreach ($pasiens as $pasien) {
            $formatted_tags[] = ['id' => $pasien->id_penduduk_pasien, 'text' => $pasien->nama];
        }

        return response()->json($formatted_tags);
    }
}

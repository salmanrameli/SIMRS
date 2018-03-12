<?php

namespace Modules\Pasien\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function index()
    {
        $pasien = Pasien::orderBy('id')->paginate(15);

        if(Auth::user()->jabatan_id == 1)
        {
            return view('pasien::administrator.index')->with('pasiens', $pasien);
        }

        return view('pasien::index')->with('pasiens', $pasien);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->jabatan_id == 1)
        {
            return view('pasien::administrator.create');
        }

        return view('pasien::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $pasien = Pasien::where('ktp', $request->ktp)->first();

        if($pasien != null)
        {
            Session::flash('warning', 'KTP sudah terdaftar');

            return redirect()->back();
        }
        else
        {
            $this->validate($request, [
                'ktp' => 'required',
                'nama' => 'required',
                'jenkel' => 'required',
                'nama_wali' => 'required',
                'alamat' => 'required',
                'tanggal_lahir' => 'required',
                'telepon' => 'required',
                'pekerjaan' => 'required',
                'agama' => 'required',
                'golongan_darah' => 'required'
            ]);

            $input = $request->all();

            Pasien::create($input);

            Session::flash('message', 'Data pasien berhasil disimpan');

            return redirect()->route('pasien.index');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $pasien = Pasien::findorFail($id);

        if(Auth::user()->jabatan_id == 1)
        {
            return view('pasien::administrator.show')->with('pasien', $pasien);
        }

        return view('pasien::show')->with('pasien', $pasien);

    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $pasien = Pasien::findorFail($id);

        return view('pasien::edit')->with('pasien', $pasien);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ktp' => 'required',
            'nama' => 'required',
            'jenkel' => 'required',
            'nama_wali' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required'
        ]);

        $input = $request->all();

        $pasien = Pasien::findorFail($id);

        $pasien->fill($input)->save();

        Session::flash('message', 'Data pasien berhasil diubah');

        return redirect()->route('pasien.show', $pasien->id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function cari(Request $request)
    {
        $query = $request->get('query');

        $results = Pasien::where('ktp', 'like', '%'.$query.'%')->
            orWhere('nama', 'like', '%'.$query.'%')->
            orWhere('tanggal_lahir', 'like', '%'.$query.'%')->
            orWhere('alamat', 'like', '%'.$query.'%')->
            orWhere('telepon', 'like', '%'.$query.'%')->get();

        return view('pasien::hasil_cari')->with('results', $results)->with('query', $query);
    }
}

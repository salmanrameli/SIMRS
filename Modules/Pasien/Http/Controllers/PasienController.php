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
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $pasien = Pasien::orderBy('id')->get();

        return view('pasien::index')->with('pasiens', $pasien);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pasien::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jenkel' => 'required',
            'tanggal_lahir' => 'required',
            'golongan_darah' => 'required'
        ]);

        $input = $request->all();

        Pasien::create($input);

        Session::flash('message', 'Data pasien berhasil disimpan');

        return redirect()->route('pasien.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $pasien = Pasien::findorFail($id);

        return view('pasien::show')->with('pasien', $pasien);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('pasien::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
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

        $results = Pasien::where('id', 'like', '%'.$query.'%')->
            orWhere('nama', 'like', '%'.$query.'%')->
            orWhere('tanggal_lahir', 'like', '%'.$query.'%')->
            orWhere('alamat', 'like', '%'.$query.'%')->
            orWhere('telepon', 'like', '%'.$query.'%')->get();

        return view('pasien::hasil_cari')->with('results', $results)->with('query', $query);
    }
}

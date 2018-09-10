<?php

namespace Modules\PersonalisasiSistem\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\PersonalisasiSistem\Entities\PersonalisasiSistem;

class PersonalisasiSistemController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $id_modul = ModulSistem::where('modul', '=', config('personalisasisistem.name'))->value('id');

        $this->middleware('userCanAccess:'.$id_modul, ['only' => 'showPersonalisasiSistem']);

        $this->middleware('userCanCreate:'.$id_modul, ['only' => ['gantiLogo', 'gantiNama']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showPersonalisasiSistem()
    {
        $nama = PersonalisasiSistem::where('id', '=', '1')->value('nama');

        return view('personalisasisistem::index')
            ->with('nama', $nama);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('personalisasisistem::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function gantiLogo(Request $request)
    {
        $request->file('logo')->storeAs('', 'logo.jpg');

        Session::flash('message', 'Upload gambar berhasil dilakukan.');

        return redirect()->route('personalisasi.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function gantiNama(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $personalisasi = PersonalisasiSistem::where('id', '=', '1')->first();

        if(!$personalisasi)
        {
            $nama = new PersonalisasiSistem();
            $nama->nama = ucwords($request->nama);
            $nama->save();
        }
        else
        {
            PersonalisasiSistem::where('id', '=', '1')->update(['nama' => ucwords($request->nama)]);
        }

        Session::flash('message', 'Nama berhasil disimpan.');

        return redirect()->route('personalisasi.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('personalisasisistem::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('personalisasisistem::edit');
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
}

<?php

namespace Modules\Dokter\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Dokter\Entities\BidangSpesialisDokter;
use Modules\Dokter\Entities\Dokter;

class DokterController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkRole:1')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $dokter = Dokter::all();
        $spesialis = BidangSpesialisDokter::all();

        return view('dokter::index')
            ->with('dokters', $dokter)
            ->with('spesialiss', $spesialis);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $spesialis = BidangSpesialisDokter::all()->pluck('nama');

        return view('dokter::dokter.create')->with('spesialiss', $spesialis);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_dokter' => 'required|unique:dokter',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'bidang_spesialis' => 'required'
        ]);

        $input = $request->all();

        Dokter::create($input);

        Session::flash('message', 'Data dokter berhasil disimpan');

        return redirect()->route('dokter.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $dokter = Dokter::findorFail($id);

        return view('dokter::dokter.show')->with('dokter', $dokter);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $dokter = Dokter::findorFail($id);
        $spesialis = BidangSpesialisDokter::all()->pluck('nama');

        return view('dokter::dokter.edit')
            ->with('dokter', $dokter)
            ->with('spesialiss', $spesialis);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_dokter' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'bidang_spesialis' => 'required'
        ]);

        $input = $request->all();

        $dokter = Dokter::findorFail($id);

        $dokter->fill($input)->save();

        Session::flash('message', 'Perubahan berhasil disimpan');

        return redirect()->route('dokter.index');
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

        $results = DB::table('dokter')->select('*')->where('id_dokter', 'like', '%'.$query.'%')->
        orWhere('nama', 'like', '%'.$query.'%')->
        orWhere('alamat', 'like', '%'.$query.'%')->
        orWhere('telepon', 'like', '%'.$query.'%')->get();

        return view('dokter::dokter.hasil_cari')->with('dokters', $results)->with('query', $query);
    }
}

<?php

namespace Modules\Dokter\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Dokter\Entities\BidangSpesialisDokter;

class BidangSpesialisDokterController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkRole:1');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('dokter::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('dokter::spesialis.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $input = $request->all();

        BidangSpesialisDokter::create($input);

        Session::flash('message', 'Bidang spesialis dokter berhasil disimpan');

        return redirect()->route('dokter.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('dokter::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $spesialis = BidangSpesialisDokter::findorFail($id);

        return view('dokter::spesialis.edit')->with('spesialis', $spesialis);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $spesialis = BidangSpesialisDokter::findorFail($id);

        $this->validate($request, [
            'nama' => 'required'
        ]);

        $input = $request->all();

        $spesialis->fill($input)->save();

        Session::flash('message', 'Perubahan detail bidang spesialis berhasil disimpan');

        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}

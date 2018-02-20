<?php

namespace Modules\Bangunan\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Bangunan\Entities\Kamar;
use Modules\Bangunan\Entities\Lantai;

class LantaiController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('bangunan::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bangunan::lantai.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_lantai' => 'required'
        ]);

        $input = $request->all();

        Lantai::create($input);

        Session::flash('message', 'Lantai berhasil ditambahkan');

        return redirect()->route('bangunan.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
//        $kamar = Kamar::join('lantai', 'lantai.nomor_lantai', '=', 'kamar.nomor_lantai')
//            ->groupBy('kamar.nomor_lantai')
//            ->orderByDesc('lantai.id')
//            ->where('lantai.nomor_lantai', '=', $id)
//            ->get(['lantai.*', 'kamar.*', DB::raw('count(kamar.id) as total_kamar')]);

        $kamar = Kamar::where('nomor_lantai', '=', $id)->get();

        return view('bangunan::lantai.show')
            ->with('nomor_lantai', $id)
            ->with('kamars', $kamar);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('bangunan::edit');
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

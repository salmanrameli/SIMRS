<?php

namespace Modules\KonsumsiObat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\KonsumsiObat\Entities\KonsumsiObat;
use Modules\RawatInap\Entities\RawatInap;

class KonsumsiObatController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllKonsumsiObat($id_ranap)
    {
        $ranap = RawatInap::where('id', '=', $id_ranap)->first();

        $obat = KonsumsiObat::where('id_ranap', '=', $id_ranap)->get();

        return view('konsumsiobat::index')
            ->with('ranap', $ranap)
            ->with('obats', $obat);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewKonsumsiObat($id_ranap)
    {
        return view('konsumsiobat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function storeKonsumsiObat(Request $request, $id_ranap)
    {
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

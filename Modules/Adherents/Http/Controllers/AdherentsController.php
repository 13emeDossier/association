<?php

namespace Modules\Adherents\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Adherents\Entities\Adherent;
use Modules\Adherents\Http\Requests\AdherentsCreateRequest;

class AdherentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $adherentList=Adherent::all();
        return view('adherents::index')->withAdherentList($adherentList);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('adherents::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AdherentsCreateRequest $request)
    {
        $adherent = new Adherent();
        $adherent->name             =$request->name;
        $adherent->firstname        =$request->firstname;
        $adherent->street_number    =$request->street_number;
        $adherent->street           =$request->street;
        $adherent->zip              =$request->zip;
        $adherent->city             =$request->city;
        $adherent->mobile_number    =$request->mobile_number;
        $adherent->phone_number     =$request->phone_number;
        $adherent->save();
        return redirect('adherents');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        $adherent = Adherent::find($id);
        return view('adherents::show')->withAdherent($adherent);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Adherent $adherent)
    {
        return view('adherents::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Adherent $adherent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

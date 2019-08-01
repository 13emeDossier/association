<?php

namespace Modules\Adherents\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Adherents\Models\Adherent;
use Modules\Adherents\Http\Requests\AdherentsCreateRequest;

class AdherentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $adherentList=Adherent::get();
        return view('adherents::adherents.index')->withAdherentList($adherentList);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('adherents::adherents.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param AdherentsCreateRequest $request
     * @return Response
     */
    public function store(AdherentsCreateRequest $request)
    {
        Adherent::create([
            'name'=>$request->name,
            'firstname'=>$request->firstname,
            'street_number'=>$request->street_number,
            'street'=>$request->street,
            'zip'=>$request->zip,
            'city'=>$request->city,
            'phone_number'=>$request->phone_number,
            'mobile_number'=>$request->mobile_number
        ]);
        return redirect(route('adherents.index'));
    }

    /**
     * Show the specified resource.
     * @param Adherent $adherent
     * @return Response
     */
    public function show(Adherent $adherent)
    {
        if($adherent->trashed())
            abort(403, 'Interdit.');
        return view('adherents::adherents.show')->withAdherent($adherent);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Adherent $adherent
     * @return Response
     */
    public function edit(Adherent $adherent)
    {
        if($adherent->trashed())
            abort(403, 'Interdit.');
        return view('adherents::adherents.edit')->withAdherent($adherent);
    }

    /**
     * Update the specified resource in storage.
     * @param AdherentsCreateRequest $request
     * @param Adherent $adherent
     * @return Response
     */
    public function update(AdherentsCreateRequest $request, Adherent $adherent)
    {
        if($adherent->trashed())
            abort(403, 'Interdit.');
        $adherent->update([
            'name'=>$request->name,
            'firstname'=>$request->firstname,
            'street_number'=>$request->street_number,
            'street'=>$request->street,
            'zip'=>$request->zip,
            'city'=>$request->city,
            'phone_number'=>$request->phone_number,
            'mobile_number'=>$request->mobile_number
        ]);
        return redirect(route('adherents.index') );
    }

    /**
     * Remove the specified resource from storage.
     * @param Adherent $adherent
     * @return Response
     */
    public function destroy(Adherent $adherent)
    {
        if($adherent->trashed())
            abort(403, 'Interdit.');
        $adherent->delete();
        return redirect(route('adherents.index'));

    }
}

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
        $adherentList=Adherent::where('is_archived','=',0)->get();
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
        $adherent->is_archived=0;
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
        if($adherent->is_archived==1)
            abort(403, 'Interdit.');
        return view('adherents::show')->withAdherent($adherent);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(int $id)
    {
        
        $adherent = Adherent::find($id);
        if($adherent->is_archived==1)
            abort(403, 'Interdit.');
        return view('adherents::edit')->withAdherent($adherent);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(AdherentsCreateRequest $request)
    {
        $adherent = Adherent::find($request->id);
        if($adherent->is_archived==1)
            abort(403, 'Interdit.');
        $adherent->name             =$request->name;
        $adherent->firstname        =$request->firstname;
        $adherent->street_number    =$request->street_number;
        $adherent->street           =$request->street;
        $adherent->zip              =$request->zip;
        $adherent->city             =$request->city;
        $adherent->mobile_number    =$request->mobile_number;
        $adherent->phone_number     =$request->phone_number;
        $adherent->update();
        return redirect(route('adherentsShow',['id'=>$adherent->id]) );
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $adherent = Adherent::find($id);
        if($adherent->is_archived==1)
            abort(403, 'Interdit.');
        $adherent->is_archived=1;
        $adherent->update();
        return redirect('adherents');

    }
}

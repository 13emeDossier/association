<?php

namespace Modules\Adherents\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Adherents\Entities\Adherent;
use Modules\Adherents\Http\Requests\AdherentsMailsCreateRequest;
use Modules\Adherents\Entities\AdherentsMail;

class AdherentsMailsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('adherents::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Adherent $adherent)
    {
        return view('adherents::adherents.mails.create')->withAdherent($adherent);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AdherentsMailsCreateRequest $request)
    {
        $adherentMail=new AdherentsMail();
        $adherentMail->adherent_id=$request->adherent_id;
        $adherentMail->usage=$request->usage;
        $adherentMail->email=$request->email;
        $adherentMail->save();
        return redirect(route('adherents.mails.edit',['id'=>$adherentMail->adherent_id]));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('adherents::adherents.mails.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('adherents::adherents.mails.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
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

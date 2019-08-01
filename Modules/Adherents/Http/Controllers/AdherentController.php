<?php

namespace Modules\Adherents\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Adherents\Models\Adherent;
use Modules\Adherents\Http\Requests\AdherentsCreateRequest;
use App\Http\Controllers\Controller as AppController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdherentController extends AppController
{
    use AuthorizesRequests;
    
    function __construct() {
        $this->middleware('can:view,adherent');
        $this->middleware('can:create,adherent');
        $this->middleware('can:update,adherent');
        $this->middleware('can:delete,adherent');
    }


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
        $this->authorize('create', Adherent::class);
        return view('adherents::adherents.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param AdherentsCreateRequest $request
     * @return Response
     */
    public function store(AdherentsCreateRequest $request)
    {
        $this->authorize('create', Adherent::class);
        Adherent::create($request->all());
        return redirect(route('adherents.index'));
    }

    /**
     * Show the specified resource.
     * @param Adherent $adherent
     * @return Response
     */
    public function show(Adherent $adherent)
    {
        $this->authorize('view', $adherent);
        return view('adherents::adherents.show')->withAdherent($adherent);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Adherent $adherent
     * @return Response
     */
    public function edit(Adherent $adherent)
    {
        $this->authorize('update', $adherent);
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
        $this->authorize('update', $adherent);
        $adherent->update($request->all());
        return redirect(route('adherents.index') );
    }

    /**
     * Remove the specified resource from storage.
     * @param Adherent $adherent
     * @return Response
     */
    public function destroy(Adherent $adherent)
    {
        $this->authorize('delete', $adherent);
        $adherent->runSoftDelete();
        return redirect(route('adherents.index'));

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO: tu nemusím posielať ['successOnCreate' => true], lebo v šablóne sa pýtam, že if isset
        return view('new_create_service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 
            'company_name' => 'required',
            'city_name' => 'required',
        ]);
        Service::create($request->all());

        return redirect()->route('new_services.create')->withSuccess('Nová služba bola vytvorená!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('new_edit_service', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $this->validate($request, [
            'name' => 'required', 
            'company_name' => 'required',
            'city_name' => 'required',
        ]);
        $service->update($request->all());

        return redirect()->route('new_services.edit', $service->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('new_all_services');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
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
        return view('new_create_worker');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
            'instagram' => 'required'
        ]);

        Worker::create($request->all());

        return redirect()->route('new_workers.create')->withSuccess('Nový pracovník bol vytvorený!');
    }

        /**
     * Store a newly created resource in storage by AJAX.
     */
    public function storeAJAX(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
            'instagram' => 'required'
        ]);
        Worker::create($request->all());

        return response()->json(['message' => 'Nový pracovník bol vytvorený!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $worker = Worker::find($id);
        return view('workers.show', ['worker' => $worker]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $worker = Worker::find($id);
        return view('new_edit_worker', ['worker' => $worker]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $worker = Worker::find($id);

        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
            'instagram' => 'required'
        ]);
        $worker->update($request->all());

        return redirect()->route('new_workers.edit', $worker->id)->withSuccess('Pracovník bol aktualizovaný!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->delete();

        return redirect()->route('new_all_workers');
    }
}

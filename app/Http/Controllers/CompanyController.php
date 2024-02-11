<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
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
        return view('new_create_company');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'category' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = time().'.'.$extension;
            $path = 'uploads/companies/';
            $file->move($path, $fileName);
        }

        Company::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'city' => $request->city,
            'category' => $request->category,
            'address' => $request->address,
            'image' => $path.$fileName
        ]);

        //Auth::user()->companies()->create( $request->all() );
        // Service::create($request->all());

        return redirect()->route('new_companies.create')->withSuccess('Nová služba bola vytvorená!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('new_edit_company', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'category' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = time().'.'.$extension;
            $path = 'uploads/companies/';
            $file->move($path, $fileName);

            if (File::exists($company->image)) {
                File::delete($company->image);
            }
        }

        $company->update([
            'name' => $request->name,
            'city' => $request->city,
            'category' => $request->category,
            'address' => $request->address,
            'image' => $path.$fileName
        ]);

        return redirect()->route('new_company.edit', $company->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if (File::exists($company->image)) {
            File::delete($company->image);
        }
        $company->delete();

        return redirect()->route('new_all_companies');
    }
}

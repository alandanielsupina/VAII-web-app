<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = time().'.'.$extension;
            $path = 'uploads/food/';
            $file->move($path, $fileName);
        }

        Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $path.$fileName
        ]);

        $food = Food::all();
        return view('food', ['food' => $food]);
    }
}

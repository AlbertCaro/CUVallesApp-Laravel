<?php

namespace App\Http\Controllers;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax())
            return Place::all()->jsonSerialize();
        return view('place.index');
    }

    public function create()
    {
        return view('place.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Place::find($id)->delete();
    }
}

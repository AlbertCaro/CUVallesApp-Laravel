<?php

namespace App\Http\Controllers;
use App\Place;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        if($request->get('foto'))
        {
            $image = $request->get('foto');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('foto'))->save(public_path('img/places/').$name);
        }
        Place::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'encargado' => $request->encargado,
            'extension' => $request->extension,
            'longitud' => $request->longitud,
            'latitud' => $request->latitud,
            'foto' => $name,
        ]);
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

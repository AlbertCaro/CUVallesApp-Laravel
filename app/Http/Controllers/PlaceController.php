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
            $name= $request->get('nombre').'.jpg';
            Image::make($request->get('foto'))
                ->resize(100, 100)
                ->save(public_path('images/places/').$name);
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

    public function edit(Request $request, $id)
    {
        if($request->ajax())
            return Place::find($id);
        return view('place.edit');
    }


    public function update(Request $request, $id)
    {
        $place = Place::findOrFail($id);
        $data = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'encargado' => $request->encargado,
            'extension' => $request->extension,
            'longitud' => $request->longitud,
            'latitud' => $request->latitud,
        ];
        if (!is_null($request->get('foto')))
        {
            $name = $request->get('nombre').'.jpg';
            if(file_exists(public_path('images/places/') . $place->foto))
            {
                unlink(public_path('images/places/') . $place->foto);
            }
            $data = $data + ['foto' => $name];
            Image::make($request->get('foto'))
                ->resize(100, 100)
                ->save(public_path('images/places/') . $name);
        }

        $place->update($data);
    }

    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        if(file_exists(public_path('images/places/').$place->foto))
        {
            unlink(public_path('images/places/') . $place->foto);
        }
        $place->delete();
    }
}

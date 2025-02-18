<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelpers;
use App\Models\Ciudadano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CiudadanoController extends Controller
{
    public function search(Request $request)
    {
        $nationality = $request->input('nationality');
        $query = $request->input('query');
        $fullId = $nationality . str_pad($query, 9, '0', STR_PAD_LEFT);

        $ciudadanos = Ciudadano::where('id', '=', $fullId)->get();

        if ($ciudadanos->isEmpty()) {
            return redirect()->back()->with('message', 'Esta Cédula no se encuentra registrada.');
        }

        foreach ($ciudadanos as $ciudadano) {
            $ciudadano->formatted_id = $this->formatId($ciudadano->id_ciudadano);
        }

        return view('busqueda', compact('ciudadanos'));
    }

    private function formatId($id)
    {
        $nationality = substr($id, 0, 1);
        $numbers = ltrim(substr($id, 1), '0');
        return $nationality . '-' . $numbers;
    }

    public function create()
    {
        return view('ciudadanos.registrar_ciudadano');
    }

    public function store(Request $request)
    {
        $id = $request->nacionalidad . $request->id;

        while (strlen($id) < 10) {
            $id = $request->nacionalidad . '0' . substr($id, 1);
        }

        $request->merge(['id' => $id]);

        $request->validate([
            'id' => 'required|unique:CIUDADANO',
            'primer_nombre' => 'required|max:255',
            'segundo_nombre' => 'max:255',
            'primer_apellido' => 'required|max:255',
            'segundo_apellido' => 'max:255',
            'sexo' => 'required|in:M,F',
            'fecha_nacimiento' => 'required|date',
            'estado_civil' => 'required|in:1,2,3,4,5,6',
            'fecha_fallecimiento' => 'date|nullable',
        ],
        [
            'id.required' => 'La Cédula es obligatoria.',
            'id.unique' => 'Esta Cédula ya se encuentra registrada en la base de datos.',
            'primer_nombre.required' => 'El Primer Nombre es obligatorio.',
            'primer_nombre.max' => 'El Primer Nombre no puede tener más de 255 caracteres.',
            'segundo_nombre.max' => 'El Segundo Nombre no puede tener más de 255 caracteres.',
            'primer_apellido.required' => 'El Primer Apellido es obligatorio.',
            'primer_apellido.max' => 'El Primer Apellido no puede tener más de 255 caracteres.',
            'segundo_apellido.max' => 'El Segundo apellido no puede tener más de 255 caracteres.',
            'sexo.required' => 'El Sexo es obligatorio.',
            'sexo.in' => 'El Sexo debe ser Masculino o Femenino.',
            'fecha_nacimiento.required' => 'La Fecha de Nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La Fecha de Nacimiento debe ser una fecha válida.',
            'estado_civil.required' => 'El Estado Civil es obligatorio.',
            'estado_civil.in' => 'El Estado Civil debe ser uno de los valores permitidos.',
            'fecha_fallecimiento.date' => 'La Fecha de Fallecimiento debe ser una fecha válida.',
        ]);

        $request['primer_nombre'] = StringHelpers::strtoupper_createCiudadano($request->primer_nombre);
        $request['segundo_nombre'] = StringHelpers::strtoupper_createCiudadano($request->segundo_nombre);
        $request['primer_apellido'] = StringHelpers::strtoupper_createCiudadano($request->primer_apellido);
        $request['segundo_apellido'] = StringHelpers::strtoupper_createCiudadano($request->segundo_apellido);

        Ciudadano::create($request->all());

        return redirect('/')->with('success', 'Ciudadano registrado satisfactoriamente!');
    }

    public function edit($id)
    {
        $ciudadano = Ciudadano::findOrFail($id);
        try {
            $ciudadano->fecha_nacimiento = $ciudadano->fecha_nacimiento ? \Carbon\Carbon::parse($ciudadano->fecha_nacimiento)->format('Y-m-d') : null;
            $ciudadano->fecha_fallecimiento = $ciudadano->fecha_fallecimiento ? \Carbon\Carbon::parse($ciudadano->fecha_fallecimiento)->format('Y-m-d') : null;
        } catch (\Exception $e) {
            $ciudadano->fecha_nacimiento = null;
            $ciudadano->fecha_fallecimiento = null;
        }
        return view('ciudadanos.editar_ciudadano', compact('ciudadano'));
    }

    public function update(Request $request, $id)
    {
        $ciudadano = Ciudadano::findOrFail($id);

        $request->validate([
            'primer_nombre' => 'required|max:255',
            'segundo_nombre' => 'max:255',
            'primer_apellido' => 'required|max:255',
            'segundo_apellido' => 'max:255',
            'sexo' => 'required|in:M,F',
            'fecha_nacimiento' => 'required|date',
            'estado_civil' => 'required|in:1,2,3,4,5,6',
            'fecha_fallecimiento' => 'date|nullable',
        ], [
            'primer_nombre.required' => 'El Primer Nombre es obligatorio.',
            'primer_nombre.max' => 'El Primer Nombre no puede tener más de 255 caracteres.',
            'segundo_nombre.max' => 'El Segundo Nombre no puede tener más de 255 caracteres.',
            'primer_apellido.required' => 'El Primer Apellido es obligatorio.',
            'primer_apellido.max' => 'El Primer Apellido no puede tener más de 255 caracteres.',
            'segundo_apellido.max' => 'El Segundo Apellido no puede tener más de 255 caracteres.',
            'sexo.required' => 'El Sexo es obligatorio.',
            'sexo.in' => 'El Sexo debe ser Masculino o Femenino.',
            'fecha_nacimiento.required' => 'La Fecha de Nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La Fecha de Nacimiento debe ser una fecha válida.',
            'estado_civil.required' => 'El Estado Civil es obligatorio.',
            'estado_civil.in' => 'El Estado Civil debe ser uno de los valores permitidos.',
            'fecha_fallecimiento.date' => 'La Fecha de Fallecimiento debe ser una fecha válida.',
        ]);

        $ciudadano->primer_nombre = StringHelpers::strtoupper_createCiudadano($request->primer_nombre);
        $ciudadano->segundo_nombre = StringHelpers::strtoupper_createCiudadano($request->segundo_nombre);
        $ciudadano->primer_apellido = StringHelpers::strtoupper_createCiudadano($request->primer_apellido);
        $ciudadano->segundo_apellido = StringHelpers::strtoupper_createCiudadano($request->segundo_apellido);
        $ciudadano->sexo = $request->sexo;
        $ciudadano->fecha_nacimiento = $request->fecha_nacimiento;
        $ciudadano->estado_civil = $request->estado_civil;
        $ciudadano->fecha_fallecimiento = $request->fecha_fallecimiento ?: null;

        $ciudadano->save();

        return redirect('/')->with('success', 'Ciudadano actualizado satisfactoriamente!');
    }
}

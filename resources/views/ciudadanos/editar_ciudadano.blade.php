@extends('ciudadanos.layout')

@section('title', 'Editar')

@section('content')
    <div class="form-box-edit">
        <div class="form value">
            <form action="{{ route('ciudadanos.update', $ciudadano->id_ciudadano) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="primer_nombre">
                    <label for="primer_nombre">Primer Nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="{{ $ciudadano->primer_nombre }}" required>
                </div>

                <div class="segundo_nombre">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="{{ $ciudadano->segundo_nombre }}">
                </div>

                <div class="primer_apellido">
                    <label for="primer_apellido">Primer Apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="{{ $ciudadano->primer_apellido }}" required>
                </div>

                <div class="segundo_apellido">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="{{ $ciudadano->segundo_apellido }}">
                </div>

                <div class="sexo">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo_input" required>
                        <option hidden selected value="{{ $ciudadano->sexo }}">
                            @switch($ciudadano->sexo)
                                @case('M')
                                    MASCULINO
                                    @break
                                @case('F')
                                    FEMENINO
                                    @break
                                @default
                                    Desconocido
                            @endswitch
                        </option>
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select>
                </div>

                <div class="estado_civil">
                    <label for="id_estado_civil">Estado Civil</label>
                    <select name="id_estado_civil" id="estado_civil_input" required>
                        <option hidden selected value="{{ $ciudadano->id_estado_civil }}">
                            @switch($ciudadano->id_estado_civil)
                                @case(1)
                                    SOLTERO(A)
                                    @break
                                @case(2)
                                    SEPARADO(A)
                                    @break
                                @case(3)
                                    VIUDO(A)
                                    @break
                                @case(4)
                                    CASADO(A)
                                    @break
                                @case(5)
                                    DIVORCIADO(A) CON NUEVAS NUPCIAS
                                    @break
                                @case(6)
                                    DIVORCIADO(A) SIN NUEVAS NUPCIAS
                                    @break
                                @default
                                    Desconocido
                            @endswitch
                        </option>
                        <option value="1">SOLTERO(A)</option>
                        <option value="2">SEPARADO(A)</option>
                        <option value="3">VIUDO(A)</option>
                        <option value="4">CASADO(A)</option>
                        <option value="5">DIVORCIADO(A) CON NUEVAS NUPCIAS</option>
                        <option value="6">DIVORCIADO(A) SIN NUEVAS NUPCIAS</option>
                    </select>
                </div>

                <div class="fecha_nacimiento">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input style="padding: 10px;" type="date" name="fecha_nacimiento" id="fecha_nacimiento_input" value="{{ $ciudadano->fecha_nacimiento }}" required>
                </div>

                <div class="fecha_fallecimiento">
                    <label for="fecha_fallecimiento">Fecha de Fallecimiento</label>
                    <input type="date" class="form-control" id="fecha_fallecimiento_input" name="fecha_fallecimiento" value="{{ $ciudadano->fecha_fallecimiento ? \Carbon\Carbon::parse($ciudadano->fecha_fallecimiento)->format('Y-m-d') : '' }}">
                </div>                

                <div class="btn-box-edit">

                    <button type="submit" class="btn-update">Actualizar</button>

                </div>

                <div class="back-edit">

                    <p><a href="{{url('/')}}">Regresar</a></p>
                    
                </div>

            </form>
        </div>
    </div>
@endsection

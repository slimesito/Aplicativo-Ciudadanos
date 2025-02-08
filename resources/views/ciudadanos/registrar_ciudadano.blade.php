@extends('ciudadanos.layout')

@section('title', 'Registrar')

@section('content')

    <div class="form-box">

        <div class="form value">

            <form method="POST" action="{{ route('registrar.ciudadano.store') }}">

                @csrf

                <h2>Registro de Ciudadanos</h2>

                <div class="cedula-inputs">

                    <div class="cedula_select">
                        <select placeholder="C.I." name="nacionalidad" id="cedula_select" required>
                            <option disabled hidden selected></option>
                            <option value="V">V</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="cedula">
                        <input type="text" placeholder="Cédula de Identidad" name="id_ciudadano" id="cedula" required>
                    </div>
                
                </div>

                <div class="primer_nombre">

                    <label for="primer_nombre">Primer Nombre</label>
                    <input type="text" placeholder="Primer Nombre" name="primer_nombre" id="primer_nombre" required autofocus>

                </div>

                <div class="segundo_nombre">

                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" placeholder="Segundo Nombre" name="segundo_nombre" id="segundo_nombre" autofocus>

                </div>

                <div class="primer_apellido">

                    <label for="primer_apellido">Primer Apellido</label>
                    <input type="text" placeholder="Primer Apellido" name="primer_apellido" id="primer_apellido" required autofocus>

                </div>
                
                <div class="segundo_apellido">

                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" placeholder="Segundo Apellido" name="segundo_apellido" id="segundo_apellido" autofocus>

                </div>

                <div class="sexo">

                    <label for="sexo">Sexo</label>
                    <select placeholder="Seleccionar Sexo" name="sexo" id="sexo_input" required>

                        <option disabled hidden selected>Sexo</option>
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>

                    </select>

                </div>

                <div class="estado_civil">

                    <label for="id_estado_civil">Estado Civil</label>
                    <select placeholder="Estado Civil" name="id_estado_civil" id="estado_civil_input" required>

                        <option disabled hidden selected>Estado Civil</option>
                        <option value="1">SOLTERO(A)</option>
                        <option value="2">SEPARADO(A)</option>
                        <option value="3">VIUDO(A)</option>
                        <option value="4">CASADO(A)</option>
                        <option value="5">DIVORCIADO(A) CON NUEVAS NUPCIAS</option>
                        <option value="6">DIVORCIADO(A) SIN NUEVAS NUPCIAS</option>

                    </select>

                </div>

                <div class="fecha_nacimiento">

                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input style="padding: 10px;" type="date" placeholder="Fecha de nacimiento" name="fecha_nacimiento" id="fecha_nacimiento_input" required>

                </div>

                <div class="fecha_fallecimiento">

                    <label for="fecha_fallecimiento">Fecha de fallecimiento</label><br>
                    <input style="padding: 10px;" type="date" placeholder="Fecha de fallecimiento" name="fecha_fallecimiento" id="fecha_fallecimiento_input">

                </div>

                <div class="btn-box-register">

                    <button class="btn-register">Registrar</button>

                </div>

                
            
            </form>

        </div>

    </div>

    <div class="back">

        <p><a href="{{url('/')}}">Regresar</a></p>
        
    </div>

@endsection
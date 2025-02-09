@extends('layout.layout')

@section('title', 'Inicio')

@section('content')

    <div class="form-box">

        <div class="form value">
                
            <h2><img src="assets/logo.png" style="width: 45%" alt=""></h2>

            <h2>Ciudadanos | IVSS</h2>

            <form method="GET" action="{{ route('buscar') }}">

                @csrf

                <div class="inputbox">

                <select class="selectBuscador" name="nationality" required>

                    <option disabled hidden selected>Seleccione la Nacionalidad</option>

                    <option value="V">Venezolano</option>

                    <option value="E">Extranjero</option>

                </select>

                </div>

                <div class="inputbox">

                    <input type="text" name="query" placeholder="Ingrese la cédula" required>

                    <ion-icon name="search-outline"></ion-icon>

                </div>

                <div class="home-btns">

                    <button type="submit" class="btn-search" role="button">Buscar</button>

            </form>

                    <a class="btn-add" role="button" href="{{ route('registrar.ciudadano.view') }}">Registrar</a>
                
                </div>

        </div>

    </div>

@endsection

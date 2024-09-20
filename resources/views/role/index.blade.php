@extends('layouts.admin')

@section('content')
    <x-alert />

    <div class="container">
        <h1>Papéis</h1>
        

        @foreach ($roles as $role)
            <p>{{ $role->name }}</p>
        @endforeach


    </div>

@endsection
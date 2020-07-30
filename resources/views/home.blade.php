@extends('layouts.app')

@section('content')
    @auth
        <h1>Welcome</h1>
    @endauth
@endsection

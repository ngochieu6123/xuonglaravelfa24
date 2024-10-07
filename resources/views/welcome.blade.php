@extends('master')
@section('content')
    <h1>Welcome</h1>
    @if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

@endsection
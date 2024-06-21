@extends('adminlte::page')

@section('title', config('app.name') . '֊' . Auth::user()->account->name)

@section('content_header')
    <h1>{{ config('app.name') }} ֊ {{ Auth::user()->account->name }}</h1>
@stop

@section('content')

@stop

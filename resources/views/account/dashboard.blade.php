@extends('adminlte::page')

@section('title', config('app.name') . '֊' . Auth::user()->account->name)

@section('content_header')
    <h1>{{ config('app.name') }} ֊ {{ Auth::user()->account->name }}</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-secondary card-outline p-3">
                <dl class="h5 mb-3">
                    <dt>Discount</dt>
                    <dd>0 %</dd>
                </dl>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-secondary card-outline p-3">
                <dl class="h5 mb-3">
                    <dt>Referral Bonus</dt>
                    <dd>{{ Auth::user()->referral_bonus }}</dd>
                </dl>
            </div>
        </div>
    </div>

@stop

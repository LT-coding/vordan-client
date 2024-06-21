@extends('adminlte::page')

@section('title', 'Addresses')

@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Addresses</li>
    </ol>
    <h1 class="mb-2">Addresses</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-danger card-outline">
                <div class="card-body">
                    @foreach($user->account->addresses as $address)
                        <div class="card p-2">
                            <p class="h4 mb-0">{!! $address->full_address !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-danger card-outline">
                <div class="card-body">
                    @include('account.profile.partials.add-address-form')
                </div>
            </div>
        </div>
    </div>
@stop


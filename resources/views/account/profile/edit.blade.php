@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    <h1 class="mb-2">Profile</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-danger card-outline">
                <div class="card-body">
                    @include('account.profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-danger card-outline">
                <div class="card-body">
                    @include('account.profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@stop


@extends('adminlte::page')

@section('title', 'Referral program ֊ ' . Auth::user()->account->name)

@section('content_header')
    <h1>{{ 'Referral program ֊ ' . Auth::user()->account->name }}</h1>
@stop

@section('content')

    <div class="card p-3">
        <p class="h5 mb-0">Referral Link: <span class="text-bold">{{ route('register') . '/' . Auth::user()->referral_code }}</span></p>
    </div>

    <div class="row">
        <div class="col-md-7">
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
        </div>
        <div class="col-md-5">
            <div class="card card-danger card-outline">
                <div class="card-body">
                    <dl class="h5 mb-3">
                        @foreach(Auth::user()->referrals as $referral)
                            <dt>{{ $referral->user->account->name . ' (' . $referral->user->email . ')' }}</dt>
                            <dd>{{ $referral->user->created_at }}</dd>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </div>

@stop

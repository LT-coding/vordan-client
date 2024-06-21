<section>
    <header>
        <h4 class="text-lg font-medium text-gray-900 mt-2 mb-3">Add Address</h4>
    </header>

    <form method="post" action="{{ route('account.addresses.save') }}">
        @csrf
        @method('patch')

        <input type="hidden" name="account_id" value="{{ $user->account->id }}">

        <x-adminlte-input name="address" label="{{ __('adminlte::adminlte.address') }}" value="{{ old('address') }}"/>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="country" label="{{ __('adminlte::adminlte.country') }}" value="{{ old('country') }}"/>
            </div>

            <div class="col-md-6">
                <x-adminlte-input name="city" label="{{ __('adminlte::adminlte.city') }}" value="{{ old('city') }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="state" label="{{ __('adminlte::adminlte.state') }}" value="{{ old('state') }}"/>
            </div>

            <div class="col-md-6">
                <x-adminlte-input name="zip" label="{{ __('adminlte::adminlte.zip') }}" value="{{ old('zip') }}"/>
            </div>
        </div>

        <div class="text-right">
            <x-adminlte-button class="btn-sm" type="submit" label="Պահպանել" theme="outline-danger" icon="fas fa-lg fa-save"/>
        </div>
    </form>
</section>

<section>
    <header>
        <h4 class="text-lg font-medium text-gray-900 mt-2 mb-3">Խմբագրել տվյալները</h4>
    </header>

    <form method="post" action="{{ route('account.profile.update') }}">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="name" label="{{ __('adminlte::adminlte.full_name') }}" value="{{ old('name') ?? $user->name }}"/>
            </div>

            <div class="col-md-6">
                <x-adminlte-input name="phone" label="{{ __('adminlte::adminlte.phone') }}" value="{{ old('phone') ?? $user->phone }}"/>
            </div>
        </div>

        <x-adminlte-input name="email" label="{{ __('adminlte::adminlte.email') }}" value="{{ old('email') ?? $user->email }}"/>

        <div class="text-right">
            <x-adminlte-button class="btn-sm" type="submit" label="Պահպանել" theme="outline-danger" icon="fas fa-lg fa-save"/>
        </div>
    </form>
</section>

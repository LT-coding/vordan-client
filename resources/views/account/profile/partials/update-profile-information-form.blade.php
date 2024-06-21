<section>
    <header>
        <h4 class="text-lg font-medium text-gray-900 mt-2 mb-3">Edit Info</h4>
    </header>

    <form method="post" action="{{ route('account.profile.update') }}">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $user->id }}">

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="name" label="{{ __('adminlte::adminlte.full_name') }}" value="{{ old('name') ?? $user->account->name }}"/>
            </div>

            <div class="col-md-6">
                <x-adminlte-input name="phone" label="{{ __('adminlte::adminlte.phone') }}" value="{{ old('phone') ?? $user->phone }}"/>
            </div>
        </div>

        <x-adminlte-input name="email" label="{{ __('adminlte::adminlte.email') }}" value="{{ old('email') ?? $user->email }}"/>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input type="date" name="date_of_birth" label="{{ __('adminlte::adminlte.date_of_birth') }}" value="{{ old('date_of_birth') ?? $user->account->date_of_birth }}"/>
            </div>

            <div class="col-md-6 radio-group">
                <div class="row">
                    <div class="col-md-3">
                        <x-adminlte-input type="radio" name="gender" id="gender-m" value="m" label="{{ __('adminlte::adminlte.male') }}" data-checked="{{ $user->account->gender == 'm' ? 'true' : '' }}"/>
                    </div>
                    <div class="col-md-3">
                        <x-adminlte-input type="radio" name="gender" id="gender-f" value="f" label="{{ __('adminlte::adminlte.female') }}" data-checked="{{ $user->account->gender == 'f' ? 'true' : '' }}"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right">
            <x-adminlte-button class="btn-sm" type="submit" label="Պահպանել" theme="outline-danger" icon="fas fa-lg fa-save"/>
        </div>
    </form>
</section>

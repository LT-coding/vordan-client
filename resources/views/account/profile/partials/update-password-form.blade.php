<section>
    <header>
        <h4 class="text-lg font-medium text-gray-900 mt-2 mb-3">Փոխել գաղտնաբառը</h4>
    </header>

    <form method="post" action="{{ route('account.password.update') }}">
        @csrf
        @method('put')

        <x-adminlte-input name="old_password" type="password" label="Հին գաղտնաբառ" autocomplete="new-password"/>

        <x-adminlte-input name="new_password" type="password" label="Նոր գաղտնաբառ" autocomplete="new-password"/>

        <x-adminlte-input name="new_password_confirmation" type="password" label="Գաղտաբառի հաստատում" autocomplete="new-password"/>

        <div class="text-right">
            <x-adminlte-button class="btn-sm" type="submit" label="Պահպանել" theme="outline-danger" icon="fas fa-lg fa-save"/>
        </div>
    </form>
</section>

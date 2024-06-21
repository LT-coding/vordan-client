<?php

namespace App\Http\Requests\Account\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [Rule::requiredIf(fn () => !$this->phone), 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($this->id)],
            'phone' => [Rule::requiredIf(fn () => !$this->email)],
            'password' => [Rule::requiredIf(fn () => !$this->id), 'confirmed', Rules\Password::defaults(fn () => !$this->id)],
            'referral' => ['nullable'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Անուն Ազգանուն դաշտը պարտադիր է:',
            'email.required' => 'էլ․ հասցե կամ հեռախոսահամար դաշտը պարտադիր է:',
            'phone.required' => 'էլ․ հասցե կամ հեռախոսահամար դաշտը պարտադիր է:',
            'email.email' => 'էլ․ հասցե դաշտը ճիշտ ձևաչափով չէ:',
            'email.unique' => 'Նշված էլ․ հասցեով օգտատեր արդեն գրանցված է:',
            'password.required' => 'Գաղտնաբառ դաշտը պարտադիր է:',
            'password.confirmed' => 'Գաղտնաբառի հաստատումը և գաղտնաբառը պետք է նույնը լինեն:',
        ];
    }
}

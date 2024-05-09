<?php

namespace App\Livewire\Forms\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Validation\Rules;

class RegisterForm extends Form
{
    #[Rule(['required', 'string', 'email'])]
    public $email;

    #[Rule(['required', 'string', 'max:255', 'unique:' . User::class . ',name'])]
    public $name;

    #[Rule(['required', 'confirmed'])]
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'password' => [Rules\Password::default()]
        ];
    }

    public function post()
    {
        $this->validate();
        $user = User::create([
            'picture' => 'https://static.vecteezy.com/system/resources/previews/009/292/244/original/default-avatar-icon-of-social-media-user-vector.jpg',
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ])->syncRoles(Role::GUEST);

        event(new Registered($user));
        auth()->login($user);

        return redirect()->route('home');
    }
}

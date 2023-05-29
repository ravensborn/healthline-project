<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Entity;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';

    public function store()
    {


        $rules = [
            'name' => 'required|string|min:3|max:35',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8|max:25',
        ];

        $validated = $this->validate($rules);

        $validated['password'] = bcrypt($validated['password']);

        $user = new User;
        $user = $user->create($validated);

        return redirect()->route('admin.users.index');

    }


    public function mount(): void
    {



    }

    public function render()
    {
        return view('livewire.admin.users.create');
    }
}

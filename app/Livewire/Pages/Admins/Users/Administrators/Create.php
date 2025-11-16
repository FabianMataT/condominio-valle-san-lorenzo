<?php

namespace App\Livewire\Pages\Admins\Users\Administrators;

use App\Models\User;
use Mary\Traits\Toast;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use Toast;
    
    public string $name = '', $email = '', $password = '', $role_name = '';

    public $roles = [];

    protected $rules = [
        'name' => 'required|string|max:50',
        'email' => 'required|string|email|max:50|unique:users,email',
        'password' => 'required|string|min:8|max:50',
        'role_name' => 'required|string|exists:roles,name',
    ];

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        $user->assignRole($this->role_name);

        return $this->success(
            __('Administrator creado exitosamente!'),
            __('Estas siendo redirigido.'),
            redirectTo: route('users.administrators.index')
        );
    }

    public function mount(){
        $this->roles = Role::select('name as role_name')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.pages.admins.users.administrators.create');
    }
}

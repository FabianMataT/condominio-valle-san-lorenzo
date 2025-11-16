<?php

namespace App\Livewire\Pages\Admins\Users\Administrators;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Show extends Component
{
    public ?User $administrator = null;
    public ?array $rows = [];
    
    public string $name = '', $email = '', $password = '', $role_name = '';
    public ?bool $editModal  = false, $deleteModal = false;

    public $roles = [];

    protected $rules = [
        'name' => 'required|string|max:50',
        'email' => 'required|string|email|max:50',
        'password' => 'required|string|min:8|max:50',
        'role_name' => 'required|string|exists:roles,name',
    ];

    public function mount()
    {
        $this->roles = Role::select('name as role_name')->get()->toArray();
    }
    
    public function edit()
    {
        $this->name = $this->administrator->name;
        $this->email = $this->administrator->email;
        $this->role_name = $this->administrator->roles->first()?->name ?? '';
        $this->editModal = true;
    }

    public function update(){
        $this->validate();

        // Resto del codigo aqui
    }

    public function render()
    {
        $headers = [
            ['key' => 'title', 'label' => 'Título'],
            ['key' => 'status', 'label' => 'Estado'],
            ['key' => 'created_at', 'label' => 'Fecha']
        ];

        $rows = collect([]);

        return view('livewire.pages.admins.users.administrators.show');
    }
}

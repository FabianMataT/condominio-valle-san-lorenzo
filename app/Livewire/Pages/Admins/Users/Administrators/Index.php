<?php

namespace App\Livewire\Pages\Admins\Users\Administrators;

use App\Models\User;
use Mary\Traits\Toast;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;

class Index extends Component
{
    use Toast;

    public string $name = '', $email = '', $password = '', $role_name = '';

    public int $perPage = 10;
    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];
    public string $search = '';
    public ?bool $createModal = false;

    public $roles = [];

    protected $rules = [
        'name' => 'required|string|max:50',
        'email' => 'required|string|email|max:50|unique:users,email',
        'password' => 'required|string|min:8|max:50',
        'role_name' => 'required|string|exists:roles,name',
    ];

    public function mount()
    {
        $this->roles = Role::select('name as role_name')->get()->toArray();
        $this->role_name = $this->roles[0]['role_name'] ?? '';
    }

    public function administrators(): LengthAwarePaginator
    {
        return User::with('roles:id,name')->select('id', 'name', 'email')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->orderBy(...array_values($this->sortBy))->paginate($this->perPage);
    }


    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        $user->assignRole($this->role_name);

        $this->reset(['name', 'email', 'password', 'role_name', 'createModal']);

        $this->success('Administrator creado exitosamente!');
    }


    public function render()
    {
        $headers = [
            ['key' => 'name', 'label' => 'Nombre'],
            ['key' => 'email', 'label' => 'Correo'],
            ['key' => 'role.name', 'label' => 'Role'],
        ];

        return view('livewire.pages.admins.users.administrators.index', [
            'administrators' => $this->administrators(),
            'headers' => $headers
        ]);
    }
}

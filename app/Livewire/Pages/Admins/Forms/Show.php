<?php

namespace App\Livewire\Pages\Admins\Forms;

use App\Models\Form;
use Livewire\Component;

class Show extends Component
{
    public ?Form $form = null;
    

    public function mount(Form $form)
    {
        $this->form = $form;
    }

    protected $rules = [
        'name' => 'required|string|max:50',
        'email' => 'required|string|email|max:50|unique:users,email',
        'password' => 'required|string|min:8|max:50',
        'role_name' => 'required|string|exists:roles,name',
    ];

     //bcrypt
    //  $user->assignRole($this->role_name);

    //     return $this->success(
    //         __('Employee created successfully!'),
    //         __('You were redirected'),
    //         redirectTo: route('employees.index')
    //     );


    // if ($this->role_name) {
    //         $this->user->syncRoles([$this->role_name]); 
    //     }

    public function render()
    {
        return view('livewire.pages.admins.forms.show');
    }
}

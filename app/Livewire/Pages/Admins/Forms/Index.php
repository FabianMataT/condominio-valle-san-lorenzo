<?php

namespace App\Livewire\Pages\Admins\Forms;

use App\Models\Form;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class Index extends Component
{
    public int $perPage = 10;
    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];
    public string $search = '';

    public ?Form $form = null;

    public function forms():LengthAwarePaginator
    {
        return Form::select('id', 'name', 'description', 'img_url', 'image_path', 'hide', 'slug')
        ->orderBy(...array_values($this->sortBy))
        ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.pages.admins.forms.index', [
            'forms' => $this->forms(),
        ]);
    }
}

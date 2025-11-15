<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    protected $casts = [
        'closed' => 'boolean',
    ];

    protected $fillable = [
        'form_id',
        'user_id',
        'closed'    
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function values()
    {
        return $this->hasMany(FormEntryValue::class);
    }
}

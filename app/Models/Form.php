<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; 

class Form extends Model
{
    protected $casts = [
        'hide' => 'boolean',
    ];

    protected $fillable = [
        'created_by',
        'updated_by',
        'name',
        'description',
        'img_url',
        'image_path',
        'hide',
        'slug'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function fields()
    {
        return $this->hasMany(FormField::class);
    }

    public function entries()
    {
        return $this->hasMany(FormEntry::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function imageSrc() : Attribute
    {
        return Attribute::make(
            get : fn () => $this->image_path ? Storage::url($this->image_path) : ($this->img_url ?: asset('images/no-image.png')) 
        );
    } 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'parent_id'
    ];

    // Define the relationship to fetch child menus
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    // Define the relationship to fetch the parent menu
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}

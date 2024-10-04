<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'manufacturer',
        'releasedate',
        'description',
    ];

    //relationship: category has many games

public function games(){
    return $this->hasMany('App\Models\game');
}
public function scopeNames($categories, $q) {
    if (trim($q)) {
        $categories->where('name', 'LIKE', "%$q%");
    }

}
}
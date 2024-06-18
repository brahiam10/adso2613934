<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'image',
        'developer',
        'releasedate',
        'categoryId',
        'userId',
        'price',
        'genre',
        'slider',
        'description',
    ];

    //relationship: Game belongs to user

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relationship: Game belongs to category
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

      //relationship: Game belongs to collections
      public function collections(){
        return $this->belongsTo('App\Models\Collection');
    }

}

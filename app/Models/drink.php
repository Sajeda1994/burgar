<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class drink extends Model
{
    use HasFactory;
    use HasTranslations;


    public $guarded=[];


    public $translatable=[
        'name',
        'description',
    ];


    public function category(){
        return $this->belongsTo(category::class);
    }

    public function order(){
        return $this->belongsToMany(order::class)->withPivot('Quantity');
    }

}

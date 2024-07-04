<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class meal extends Model
{
    use HasFactory;
    use HasTranslations;



    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'category_id',
        'image',
    ];

    public $translatable=[
        'name',
        'description',
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function order():BelongsToMany{
        return $this->belongsToMany(order::class)->withPivot('Quantity');
    }
}

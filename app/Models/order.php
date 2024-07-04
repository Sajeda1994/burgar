<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class order extends Model
{
    use HasFactory;

    public $guarded=[];


    public function user(){
       return $this->belongsTo(User::class);
    }

    public function meal():BelongsToMany{
        return $this->belongsToMany(meal::class)->withPivot('Quantity');
    }
}

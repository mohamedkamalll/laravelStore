<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable =["category_id",'name','stock','price','description'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

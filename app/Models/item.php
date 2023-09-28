<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class item extends Model
{
    use HasFactory;
    protected $fillable = ['name','category_id','price','desc','img'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['name','menu_id'];

    public function menu()
    {
        return $this->belongsTo(menu::class);
    }
}

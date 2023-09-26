<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Dashboard;

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin',[Dashboard::class,'index']);
});
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Dashboard;
use App\Http\Controllers\Panel\Menu_Cont;
use App\Http\Controllers\Panel\Category_Cont;

Route::middleware(['auth','admin'])->group(function(){

    //Dashboard
    Route::get('/admin',[Dashboard::class,'index']);

    //Menu List
    Route::get('/admin/menu/list',[Menu_Cont::class,'list'])->name('menu_list');
    //Menu Create
    Route::get('/admin/menu/create',[Menu_Cont::class,'showCreate'])->name('menu_create');
    Route::post('/admin/menu/create',[Menu_Cont::class,'create']);
    //Menu Edit
    Route::get('/admin/menu/edit/{menu:id}',[Menu_Cont::class,'showEdit'])->name('menu_edit');
    Route::post('/admin/menu/edit/{menu:id}',[Menu_Cont::class,'edit']);
    //Menu Delete
    Route::get('/admin/menu/delete/{menu:id}',[Menu_Cont::class,'delete']);


    //Category List
    Route::get('/admin/category/list',[Category_Cont::class,'list'])->name('category_list');
    //Category Create
    Route::get('/admin/category/create',[Category_Cont::class,'showCreate'])->name('category_create');
    Route::post('/admin/category/create',[Category_Cont::class,'create']);
    //Category Edit
    Route::get('/admin/category/edit/{category:id}',[Category_Cont::class,'showEdit'])->name('category_edit');
    Route::post('/admin/category/edit/{category:id}',[Category_Cont::class,'edit']);
    //Category Delete
    Route::get('/admin/category/delete/{category:id}',[Category_Cont::class,'delete']);
    
});
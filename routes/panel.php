<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Dashboard;
use App\Http\Controllers\Panel\Menu_Cont;
use App\Http\Controllers\Panel\Category_Cont;
use App\Http\Controllers\Panel\Item_Cont;
use App\Http\Controllers\Panel\Setting_Cont;
use App\Http\Controllers\Panel\User_Cont;

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


    //Item List
    Route::get('/admin/item/list',[Item_Cont::class,'list'])->name('item_list');
    //Item Create
    Route::get('/admin/item/create',[Item_Cont::class,'showCreate'])->name('item_create');
    Route::post('/admin/item/create',[Item_Cont::class,'create']);
    //Item Edit
    Route::get('/admin/item/edit/{item:id}',[Item_Cont::class,'showEdit'])->name('item_edit');
    Route::post('/admin/item/edit/{item:id}',[Item_Cont::class,'edit']);
    //Item Delete
    Route::get('/admin/item/delete/{item:id}',[Item_Cont::class,'delete']);

    
    //User List
    Route::get('/admin/user/list',[User_Cont::class,'list'])->name('user_list');
    //User Create
    Route::get('/admin/user/create',[User_Cont::class,'showCreate'])->name('user_create');
    Route::post('/admin/user/create',[User_Cont::class,'create']);
    //User Edit
    Route::get('/admin/user/edit/{user:id}',[User_Cont::class,'showEdit'])->name('user_edit');
    Route::post('/admin/user/edit/{user:id}',[User_Cont::class,'edit']);
    //User Deleted
    Route::get('/admin/user/delete/{user:id}',[User_Cont::class,'delete']);


    //Setting Section
    Route::get('/admin/setting',[Setting_Cont::class,'showSetting'])->name('setting_show');
    //Setting Save
    Route::post('/admin/setting',[Setting_Cont::class,'saveSetting']);
    
});
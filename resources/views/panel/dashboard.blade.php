@extends('layouts.panel')

@section('title')
داشبورد
@endsection


@section('content')
<div class="d100 box">
    <div class="box-information">
        <div class="box-icon">
            <i class="fa fa-list-alt"></i>
        </div>
        <div class="box-body">
             {{$menus}} منو
        </div>
        <div class="box-title">تعداد منو ها</div>
    </div>
    <div class="box-information">
        <div class="box-icon">
            <i class="fa fa-list"></i>
        </div>
        <div class="box-body">
             {{$categories}} دسته بندی
        </div>
        <div class="box-title">تعداد دسته بندی ها</div>
    </div>
    <div class="box-information">
        <div class="box-icon">
            <i class="fa fa-utensils"></i>
        </div>
        <div class="box-body">
             {{$items}} آیتم
        </div>
        <div class="box-title">تعداد آیتم ها</div>
    </div>
    <div class="box-information">
        <div class="box-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="box-body">
             {{$users}} کاربر
        </div>
        <div class="box-title">تعداد کاربران</div>
    </div>
</div>
@endsection
@extends('layouts.panel')

@section('title')
    لیست دسته بندی ها
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
           دسته بندی ها
        </div>
        <div class="card-body">
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>منو</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item->menu->name}}</td>
                        <td class="text-center"><a href="/admin/category/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a> <a href="/admin/category/delete/{{$item['id']}}" class="button button-danager-light">حذف</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if($categories->lastPage() != 1)
<div class="pagination text-left">
    <h5>صفحه</h5>
    @for($i = 1;$i<=$categories->lastPage();$i++)
    @if($i == $categories->currentPage())
    <a href="?page={{$i}}" class="button-information">{{$i}}</a>
    @else
    <a href="?page={{$i}}" class="button-information-light">{{$i}}</a> 
    @endif
    @endfor
</div>
@endif
<script>
    $('.button-danager-light').on('click',function(event)
    {
        let fbutton = this;
        event.preventDefault();
        alertify.confirm('حذف دسته بندی', 'از حذف دسته بندی اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection
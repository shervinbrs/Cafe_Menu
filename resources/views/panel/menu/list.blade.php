@extends('layouts.panel')

@section('title')
    لیست منو ها
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
           منو ها
        </div>
        <div class="card-body">
            <table class="d100 text-right">
                <thead>
                    <th>آیکون</th>
                    <th>نام</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($menus as $item)
                    <tr>
                        <td><img src="/storage/{{$item['icon']}}" alt="icon" width=64px height=64px></td>
                        <td>{{$item['name']}}</td>
                        <td class="text-center"><a href="/admin/menu/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a> <a href="/admin/menu/delete/{{$item['id']}}" class="button button-danager-light">حذف</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if($menus->lastPage() != 1)
<div class="pagination text-left">
    <h5>صفحه</h5>
    @for($i = 1;$i<=$menus->lastPage();$i++)
    @if($i == $menus->currentPage())
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
        alertify.confirm('حذف منو', 'از حذف منو اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection
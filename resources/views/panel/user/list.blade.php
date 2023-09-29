@extends('layouts.panel')

@section('title')
    لیست کاربران
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
           کاربران
        </div>
        <div class="card-body">
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>شماره همراه</th>
                    <th>ایمیل</th>
                    <th>سطح</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['username']}}</td>
                        <td>{{$item['email']}}</td>
                        <td>
                            @if($item['type'] == 0)
                            کاربر
                            @else
                            مدیر
                            @endif
                        </td>
                        <td class="text-center"><a href="/admin/user/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a> <a href="/admin/user/delete/{{$item['id']}}" class="button button-danager-light">حذف</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if($users->lastPage() != 1)
<div class="pagination text-left">
    <h5>صفحه</h5>
    @for($i = 1;$i<=$users->lastPage();$i++)
    @if($i == $users->currentPage())
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
        alertify.confirm('حذف کاربر', 'از حذف کاربر اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection
@extends('layouts.panel')

@section('title')
    لیست رویداد ها
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
           رویداد ها
        </div>
        <div class="card-body">
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>تاریخ</th>
                    <th>ساعت</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($events as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['date']}}</td>
                        <td>{{json_decode($item['time'])[0]}} الی {{json_decode($item['time'])[1]}}</td>
                        <td class="text-center"><a href="/admin/event/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a> <a href="/admin/event/delete/{{$item['id']}}" class="button button-danager-light">حذف</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if($events->lastPage() != 1)
<div class="pagination text-left">
    <h5>صفحه</h5>
    @for($i = 1;$i<=$events->lastPage();$i++)
    @if($i == $events->currentPage())
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
        alertify.confirm('حذف رویداد', 'از حذف رویداد اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection
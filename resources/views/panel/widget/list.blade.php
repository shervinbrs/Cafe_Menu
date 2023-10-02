@extends('layouts.panel')

@section('title')
    لیست ویجت ها
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
           ویجت ها
        </div>
        <div class="card-body">
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>وضعیت</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($widgets as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{__('panel.'.$item['name'])}}</td>
                            @if($item['is_active'])
                            <td style="color:green;">
                                فعال
                            </td>
                            @else
                            <td style="color:red;">
                                غیرفعال
                            </td>
                            @endif
                        <td class="text-center"><a href="/admin/widget/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if($widgets->lastPage() != 1)
<div class="pagination text-left">
    <h5>صفحه</h5>
    @for($i = 1;$i<=$widgets->lastPage();$i++)
    @if($i == $widgets->currentPage())
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
        alertify.confirm('حذف ویجت', 'از حذف ویجت اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection
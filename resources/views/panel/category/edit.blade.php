@extends('layouts.panel')

@section('title')
ویرایش دسته بندی
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          ویرایش دسته بندی
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="d50 center">
                    </div>
                    <div class="input d25 block center">
                        <span>منو :</span>
                        <select name="menu_id">
                            @foreach($menus as $item)
                            <option value="{{$item['id']}}" @if($item['id'] == $category['menu_id']) selected @endif>{{$item['name']}}</option>
                            @endforeach
                        </select>
                    </div>
              <div class="input d25 block center">
                  <span>نام دسته بندی :</span>
                  <input type="text" name="name" placeholder="نام دسته بندی" value="{{$category['name']}}">
              </div>
              <div class="d25 center">
                  <div class="input d25 block center">
                      @csrf
                  <input type="submit" class="button button-success-light" value="ویرایش">
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>
<script>
                            document.getElementById('file').addEventListener("change", function(event) {
                        var file = event.target.files[0];
                        var reader = new FileReader();
                        reader.onload = function(e) {
                        document.getElementById('preimg').src = e.target.result;
                        // $('.upload-area h3').hide()
                        };
                            reader.readAsDataURL(file);
                        })
                        $('.upload-area').on('click',function()
                        {
                            document.getElementById('file').click();
                        })
</script>
@endsection
@extends('layouts.panel')

@section('title')
ویرایش آیتم
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          ویرایش آیتم
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="d50 center">
                    <div class="input d50 text-center">
                        <div class="upload-area">
                            <img id="preimg" src="/storage/{{$Selecteditem['img']}}">
                            <h3 class="">برای بارگزاری تصویر <a class="text-info">کلیک</a> کنید</h3>
                            <input type="file" id="file" name="thumbnail" hidden>
                        </div>
                    </div>
                    </div>
              <div class="input d25 block center">
                  <span>نام آیتم :</span>
                  <input type="text" name="name" placeholder="*نام آیتم" maxlength="30" required value="{{$Selecteditem['name']}}">
              </div>
              <div class="input d25 block center">
                <span>قیمت :</span>
                <input type="number" name="price" placeholder="*قیمت(تومان)" required value="{{$Selecteditem['price']}}">
            </div>
            <div class="input d25 block center">
                <span>توضیحات :</span>
                <input type="text" name="desc" placeholder="*توضیحات" maxlength="100" required value="{{$Selecteditem['desc']}}">
            </div>
              <div class="input d25 block center">
                  <span>دسته بندی :</span>
                  <select name="category_id">
                      @foreach($categories as $item)
                      <option value="{{$item['id']}}" @if($item['id'] == $Selecteditem['category_id']) selected @endif>{{$item['name']}}</option>
                      @endforeach
                  </select>
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
@extends('layouts.panel')

@section('title')
افزودن آیتم
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          افزودن آیتم
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="d50 center">
                    <div class="input d50 text-center">
                        <div class="upload-area">
                            <img id="preimg">
                            <h3 class="">برای بارگزاری تصویر <a class="text-info">کلیک</a> کنید</h3>
                            <input type="file" id="file" name="thumbnail" hidden required>
                        </div>
                    </div>
                    </div>
              <div class="input d25 block center">
                  <span>نام آیتم :</span>
                  <input type="text" name="name" placeholder="*نام آیتم" maxlength="30" required>
              </div>
              <div class="input d25 block center">
                <span>قیمت :</span>
                <input type="number" name="price" placeholder="*قیمت(تومان)" required>
            </div>
            <div class="input d25 block center">
                <span>توضیحات :</span>
                <input type="text" name="desc" placeholder="*توضیحات" maxlength="100" required>
            </div>
              <div class="input d25 block center">
                  <span>دسته بندی :</span>
                  <select name="category_id">
                      @foreach($categories as $item)
                      <option value="{{$item['id']}}">{{$item['name']}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="d25 center">
                  <div class="input d25 block center">
                      @csrf
                  <input type="submit" class="button button-success-light" value="افزودن">
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
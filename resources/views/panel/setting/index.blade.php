@extends('layouts.panel')

@section('title')
تنظیمات
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          تنظیمات
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
              <div class="input d25 block center">
                  <span>نام کافه :</span>
                  <input type="text" name="cafeName" placeholder="نام کافه" value="{{$settings['cafeName'][0]['value']}}">
              </div>
              <div class="d25 center">
                  <div class="input d25 block center">
                      @csrf
                  <input type="submit" class="button button-success-light" value="ذخیره">
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
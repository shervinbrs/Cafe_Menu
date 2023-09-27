@extends('layouts.panel')

@section('title')
افزودن منو
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          افزودن منو
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="d50 center">
                    <div class="input d50 text-center">
                        <div class="upload-area">
                            <img id="preimg" src="/storage/{{$menu['icon']}}">
                            <h3 class="">برای بارگزاری آیکون <a class="text-info">کلیک</a> کنید</h3>
                            <input type="file" id="file" name="icon" hidden>
                        </div>
                    </div>
                    </div>
              <div class="input d25 block center">
                  <span>نام منو :</span>
                  <input type="text" name="name" placeholder="نام منو" value="{{$menu['name']}}">
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
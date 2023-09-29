@extends('layouts.panel')

@section('title')
ویرایش کاربر
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          ویرایش کاربر
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="d50 center">
                    </div>
                    <div class="input d25 block center">
                        <span>تلفن همراه :</span>
                        <input type="text" name="username" placeholder="تلفن همراه" value="{{$user['username']}}" required>
                    </div>
              <div class="input d25 block center">
                  <span>نام کاربر :</span>
                  <input type="text" name="name" placeholder="نام کاربر" value="{{$user['name']}}" required>
              </div>
              <div class="input d25 block center">
                  <span>ایمیل :</span>
                  <input type="text" name="email" placeholder="ایمیل" value="{{$user['email']}}" required>
              </div>
              <div class="input d25 block center">
                  <span>رمز عبور :</span>
                  <input type="password" name="password" placeholder="رمز عبور">
              </div>
              <div class="input d25 block center">
                  <span>سطح :</span>
                  <select name="type">
                      <option value="0" @if($user['type'] == 0) selected @endif>کاربر</option>
                      <option value="1" @if($user['type'] == 1) selected @endif>مدیر</option>
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
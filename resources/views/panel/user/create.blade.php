@extends('layouts.panel')

@section('title')
افزودن کاربر
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          افزودن کاربر
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="d50 center">
                    </div>
                    <div class="input d25 block center">
                        <span>تلفن همراه :</span>
                        <input type="text" name="username" placeholder="تلفن همراه" required>
                    </div>
              <div class="input d25 block center">
                  <span>نام کاربر :</span>
                  <input type="text" name="name" placeholder="نام کاربر" required>
              </div>
              <div class="input d25 block center">
                  <span>ایمیل :</span>
                  <input type="text" name="email" placeholder="ایمیل" required>
              </div>
              <div class="input d25 block center">
                  <span>رمز عبور :</span>
                  <input type="password" name="password" placeholder="رمز عبور" required>
              </div>
              <div class="input d25 block center">
                  <span>سطح :</span>
                  <select name="type">
                      <option value="0">کاربر</option>
                      <option value="1">مدیر</option>
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
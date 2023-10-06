@extends('layouts.panel')

@section('title')
ویرایش رویداد
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          ویرایش رویداد
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="d50 center">
                    <div class="input d50 text-center">
                        <div class="upload-area">
                            <img id="preimg" src="/storage/{{$event['img']}}">
                            <h3 class="">برای بارگزاری آیکون <a class="text-info">کلیک</a> کنید</h3>
                            <input type="file" id="file" name="thumb" hidden>
                        </div>
                    </div>
                    </div>
              <div class="input d25 block center">
                  <span>نام رویداد :</span>
                  <input type="text" name="name" placeholder="نام رویداد" value="{{$event['name']}}">
              </div>
              <div class="d25 center block">
                <div class="input d100">
                    <span>تاریخ انتشار :</span>
                    <input name="date" type="text" class="dateinput">
                </div>
            </div>
              <div class="d25 center block">
                <div class="input d25 inline">
                    <span>از :</span>
                    <input name="number" type="number" required min="1" max="24" step=".01" value="{{json_decode($event['time'])[0]}}">
                </div>
                الی
                <div class="input d25 inline">
                    <span>تا :</span>
                    <input name="number2" type="number" required required min="1" max="24" step=".01" value="{{json_decode($event['time'])[1]}}">
                </div>
            </div>
              <div class="input d25 block center">
                  <span>توضیحات : </span>
                  <textarea name="desc" cols="30" rows="10"style="border-radius: 5px;
                  outline: none;
                  border: 1px solid #ccc;
                  padding: 10px 8px;
                  width: 100%;">{{$event['desc']}}</textarea>
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
<script>
    $('.dateinput').persianDatepicker({
format: 'YYYY-MM-DD',
calendar:{
persian: {
  locale: 'en'
}
}
});
$('.dateinput').val('{{$event['date']}}');
</script>
@endsection
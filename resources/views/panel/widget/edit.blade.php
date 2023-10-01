@extends('layouts.panel')

@section('title')
ویرایش ویجت
@endsection

@section('content')
<script src="{{URL::asset('/js/ckeditor')}}/ckeditor.js"></script>
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
          ویرایش ویجت
        </div>
        <div class="card-body text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="d50 center">
                    </div>
                    <div class="input d25 block center">
                        <span>نام ویجت : </span>
                        <input type="text" placeholder="نام" value="{{$widget['name']}}" disabled>
                    </div>
                    <div class="input d100 block center">
                        <span>محتوا :</span>
                        @switch($widget['type'])
                        @case('input')
                        <div class="d50">
                        <input type="text" name="content" placeholder="محتوا" value="{{$widget['name']}}">
                        </div>
                        @break
                        @case('ckeditor')
                        <div class="d75 center">
                            <textarea id="temp_field" hidden>{{$widget['content']}}</textarea>
                            <textarea name="content" id="editor1">
                            </textarea>
                        </div>
                        @break
                        @endswitch
                    </div>
                    <div class="d75 center">
                        <div class="input d25">
                            <span>نمایش : </span>
                            <input type="checkbox" name="is_active" @if($widget['is_active']) checked @endif>
                        </div>
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
                            CKEDITOR.replace( 'editor1' ,{
                            language:'fa'
                        });
var editor = CKEDITOR.instances.editor1;
if (editor) {
  editor.setData($('#temp_field').val());
}
</script>
@endsection
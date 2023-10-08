<div class="modal fade" id="eventsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">رویداد ها</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @if(count($events) == 0)
                <div class="col-12">
                    <p class="text-center">در حال حاضر هیچ رویدادی پیش رو نیست</p>
                </div>
                @endif
                @foreach($events as $item)
                <div class="col-12">
                    <div class="card eventModal">
                        <div class="card-body rounded d-flex">
                            <img src="/storage/{{$item['img']}}" alt="{{$item['name']}}" class="rounded ml-2" width="96px">
                            <div>
                                <span class="text-center">{{$item['date']}}</span>
                                <span class="text-center">{{json_decode($item['time'])[0]}} الی {{json_decode($item['time'])[1]}}</span>
                                <h6 class="card-title mt-2">{{$item['name']}}</h5>
                                <p class="text-justify">{{$item['desc']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
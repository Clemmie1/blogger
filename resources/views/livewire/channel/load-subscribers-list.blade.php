<div>
    <div class="row text-center" wire:init="getList">

        @if(is_null($loadData))
            <div>
                <div class="spinner-grow" style="width: 3.5rem; height: 3.5rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        @else
            @if($notFound)
                <div class="text-muted">
                    <p>У этого канала нету подписчиков</p>
                </div>
            @else
                @foreach($loadData as $list)
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 w-30 mb-15 mx-auto" title="LisenoK_B_Krosax">
                        <div>
                            <img src="https://ui-avatars.com/api/?rounded=false&color=ffff&background=346beb&name=KZ" class="img-fluid rounded w-55">
                            <span class="d-block font-14">
                                <div class="text-truncate mt-2">{{\App\Models\User::find($list->user_id)->first_name}} {{\App\Models\User::find($list->user_id)->last_name}}</div>
                                <p class="fs-sm">{{$list->created_at->format('d.m.Y')}}</p>
                             </span>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif


        {{--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 w-30 mb-15 mx-auto" title="LisenoK_B_Krosax">
            <div>
                <img src="https://ui-avatars.com/api/?rounded=false&color=ffff&background=346beb&name=KZ" class="img-fluid rounded w-55">
                <span class="d-block font-14">
                        <div class="text-truncate mt-2">Kirill Zineko</div>
                        <p class="fs-sm">23.04.2023</p>
                     </span>
            </div>
        </div>--}}


    </div>
</div>

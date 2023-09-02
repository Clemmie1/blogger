<div wire:init="getChannle">

    @if(is_null($loadData))
        <div class="d-block rounded-1 border-0 placeholder placeholder-wave mb-4" style="width: auto; height: 117.27px;"></div>
        <div class="d-block rounded-1 border-0 placeholder placeholder-wave mb-4" style="width: auto; height: 117.27px;"></div>
        <div class="d-block rounded-1 border-0 placeholder placeholder-wave mb-4" style="width: auto; height: 117.27px;"></div>

    @else
        @if($notFound)
            <div class="align-items-sm-center text-center py-lg-5">
                <div class="mb-4">
                    <i class='bx bx-chalkboard bx-lg'></i>
                </div>
                <span>У Вас нет каналов.<br>Создайте свой первый канал!</span>
            </div>
        @else
            @foreach($loadData as $list)
                @if(!$list->banned)
                    <div class="card d-sm-flex flex-sm-row align-items-sm-center justify-content-between border-0 shadow-sm p-3 p-md-4 mb-4">
                        <div class="d-flex align-items-center pe-sm-3">
                            {{--                        @php($imageUrl = \Illuminate\Support\Facades\Storage::url('avatar_channel/' . $list->avatar))--}}
                            <img src="{{asset('storage/avatar_channle/'.$list->avatar)}}" width="74" height="74">
                            <div class="ps-3 ps-sm-4">
                                <h6 class="mb-2">{{$list->name}} @if($list->verified)<i class='bx bxs-badge-check text-primary'></i>@endif</h6>
                                <div class="fs-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{\App\Http\Controllers\ConvertTime::convert($list->created_at, false)}}">создан {{\App\Http\Controllers\ConvertTime::convert($list->created_at, true)}}</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pt-3 pt-sm-0">
                            <button type="button" class="btn btn-outline-secondary px-3 px-xl-4 me-3" onclick="location.href='{{route('account.my.channle.details', $list->id)}}'">
                                <i class="bx bx-info-circle fs-xl me-lg-1 me-xl-2"></i>
                                <span class="d-none d-lg-inline">Обзор</span>
                            </button>
                            <button type="button" class="btn btn-outline-danger px-3 px-xl-4" wire:click="deleteChannle({{$list->id}})">
                                <i class="bx bx-trash-alt fs-xl me-lg-1 me-xl-2"></i>
                                <span class="d-none d-lg-inline">Удалить</span>
                            </button>
                        </div>
                    </div>
                @else
                    <div class="card d-sm-flex flex-sm-row align-items-sm-center justify-content-between border-0 shadow-sm p-3 p-md-4 mb-4">
                        <div class="d-flex align-items-center pe-sm-3">
                            {{--                        @php($imageUrl = \Illuminate\Support\Facades\Storage::url('avatar_channel/' . $list->avatar))--}}
                            <img src="{{asset('storage/avatar_channle/'.$list->avatar)}}" width="74" height="74">
                            <div class="ps-3 ps-sm-4">
                                <h6 class="mb-2">{{$list->name}} @if($list->verified)<i class='bx bxs-badge-check text-primary'></i>@endif</h6>
                                <div class="fs-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{\App\Http\Controllers\ConvertTime::convert($list->created_at, false)}}">создан {{\App\Http\Controllers\ConvertTime::convert($list->created_at, true)}}</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pt-3 pt-sm-0">
                            <span class="badge bg-faded-danger text-danger">ЗАБЛОКИРОВАН</span>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endif
</div>

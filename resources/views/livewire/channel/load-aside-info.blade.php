<div>
    <div class="position-sticky top-0" wire:init="loadChannel">
        @if(is_null($loadData))
            <div class="text-center pt-5">
                <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
                    <img class="d-block rounded-circle placeholder placeholder-wave" width="120" height="120">
                </div>
                <p class="placeholder placeholder-wave placeholder-lg col-7 me-2 h5 mb-1"></p>
                <p class="placeholder placeholder-wave placeholder-lg col-7 me-2 mb-3 pb-3"></p>
                <br>
                <a class="btn btn-secondary disabled placeholder  placeholder-wave mb-3" style="height: 44.39px; width: 163.42px;"> </a>


                <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-5" data-bs-toggle="collapse" data-bs-target="#account-menu">
                    <i class="bx bxs-info-circle fs-xl me-2"></i>
                    Инфно
                    <i class="bx bx-chevron-down fs-lg ms-1"></i>
                </button>
                <div id="account-menu" class="list-group list-group-flush collapse d-md-block">

                    <div class="d-block placeholder placeholder-wave mb-1 rounded-1" style="height: 49px;"></div>
                    <div class="d-block placeholder placeholder-wave mb-1 rounded-1" style="height: 49px;"></div>
                    <div class="d-block placeholder placeholder-wave mb-1 rounded-1" style="height: 49px;"></div>
                    <div class="d-block placeholder placeholder-wave mb-1 rounded-1" style="height: 49px;"></div>
                    <div class="d-block placeholder placeholder-wave mb-1 rounded-1" style="height: 49px;"></div>

                </div>
            </div>
        @else
            <div class="text-center pt-5">
                <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
                    <img src="{{asset('storage/avatar_channle/'.$loadData['avatar'])}}"  width="120" alt="John Doe">
                </div>
                <h2 class="h5 mb-1">{{$loadData['name']}} @if($loadData['verified'])<i class='bx bxs-badge-check text-primary'></i>@endif</h2>
                <p class="pb-3 mb-1">{{'@'.$loadData['username']}}</p>

                @if(\Illuminate\Support\Facades\Auth::check())
                    @if($subscribe)
                        <div class="btn-group dropdown mb-4">

                            <button type="button" class="btn btn-secondary shadow-secondary dropdown-toggle text-uppercase" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Вы подписаны
                            </button>
                            <div class="dropdown-menu dropdown-menu-end my-1 text-uppercase">
                                <a href="#" class="dropdown-item" wire:click="unsubscribe({{$channelID}})">Отменить подписку</a>
                            </div>
                        </div>
                    @else
                        <button type="button" class="btn btn-secondary shadow-secondary mb-4 text-uppercase" wire:click="subscribe({{$channelID}})">Подписаться</button>
                    @endif
                @else
                    <button type="button" class="btn btn-secondary shadow-secondary mb-4 text-uppercase" disabled>Подписаться</button>
                @endif


                <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                    <i class="bx bxs-info-circle fs-xl me-2"></i>
                    Инфно
                    <i class="bx bx-chevron-down fs-lg ms-1"></i>
                </button>
                <div id="account-menu" class="list-group list-group-flush collapse d-md-block">


                    <a class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalScroll">
                        <i class="bx bx-user fs-xl opacity-60 me-2"></i>
                        Подписчиков
                        <span class="ms-auto">{{$total_sub}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="bx bx-low-vision fs-xl opacity-60 me-2"></i>
                        Просмотров
                        <span class="ms-auto">{{$loadData['total_views']}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="bx bx-like fs-xl opacity-60 me-2"></i>
                        Лайков
                        <span class="ms-auto">{{$loadData['total_likes']}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="bx bx-clipboard fs-xl opacity-60 me-2"></i>
                        Постов
                        <span class="ms-auto">{{$loadData['total_post']}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="bx bx-comment fs-xl opacity-60 me-2"></i>
                        Комментарий
                        <span class="ms-auto">{{$loadData['total_comments']}}</span>
                    </a>

                </div>
            </div>
        @endif

    </div>
</div>

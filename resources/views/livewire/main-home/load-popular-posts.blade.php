<div>
    <div class="offcanvas-body" wire:init="getPopularPosts">

        @if(!is_null($loadData))

            <!-- Categories -->
            <div class="card card-body mb-4">
                <h3 class="h5">Категории</h3>
                <ul class="nav flex-column fs-sm">
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link py-1 px-0">Игры</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link py-1 px-0">Крипта</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link py-1 px-0">Новости</a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="#" class="nav-link py-1 px-0">Мир</a>
                    </li>
                </ul>
            </div>


            <!-- Popular posts -->
            <div class="card card-body border-0 position-relative mb-4">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-primary opacity-10 rounded-3"></span>
                <div class="position-relative zindex-2">
                    <h3 class="h5">Популярные посты</h3>
                    <ul class="list-unstyled mb-0">
                        @foreach($loadData as $list)
                            @if(!$list->private)
                                <li class="border-bottom pb-3 mb-3">
                                    <h4 class="h6 mb-2 text-truncate" style="max-width: auto;">
                                        <a href="{{route('mainhome.viewPost', ['channle'=>\App\Http\Controllers\coreChannle::getUsername($list->channle_id),'id'=>$list->id])}}">{{$list->title}}</a>
                                    </h4>
                                    <div class="d-flex align-items-center text-muted pt-1">
                                        <div class="fs-xs border-end pe-3 me-3">{{\App\Http\Controllers\ConvertTime::convert($list->created_at, true)}}</div>
                                        <div class="d-flex align-items-center me-3">
                                            <i class="bx bx-low-vision fs-base me-1"></i>
                                            <span class="fs-xs">{{$list->total_views}}</span>
                                        </div>
                                        <div class="d-flex align-items-center me-3">
                                            <i class="bx bx-like fs-base me-1"></i>
                                            <span class="fs-xs">{{$list->total_likes}}</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-comment fs-base me-1"></i>
                                            <span class="fs-xs">{{$list->total_comments}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <div class="d-block mb-4 placeholder placeholder-wave" style="width: auto; height: 231.56px; border-radius: 0.5em"></div>
            <div class="d-block mb-4 placeholder placeholder-wave" style="width: auto; height: 385.91px; border-radius: 0.5em"></div>
        @endif

    </div>
</div>

<div>
    <div class="w-100 mb-sm-5">
        <div class="input-group" wire:keydown.enter="search">
            <input type="text" class="form-control pe-5 rounded" placeholder="Найти блог, пост или контент..." wire:model="searchName">
            <i class="bx bx-search position-absolute top-50 end-0 translate-middle-y me-3 fs-lg zindex-5" wire:loading.remove wire:target="search"></i>
            <div wire:loading wire:target="search">
                <div class="top-50 end-0 me-3 fs-lg zindex-5 position-absolute translate-middle-y">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($start)
        <div class="mb-4 text-center">
            <i class='bx bx-search opacity-25' style="font-size: 5em;"></i>
            <h5 class="opacity-25">Найдите, что Вам нужно!</h5>
        </div>
    @else
        @if(is_null($loadData))
            <div class="d-block rounded-1 border-0 placeholder placeholder-wave mb-4" style="width: auto; height: 117.27px;"></div>
        @else
            @if($notFound)
                <div class="mb-4 text-center">
                    <i class='bx bx-search opacity-25' style="font-size: 5em;"></i>
                    <h5 class="opacity-25">Ничего не найдено</h5>
                </div>
            @else
                @foreach($loadData as $list)
                    @if(!$list->private)
                        <article class="card border-0 shadow-sm overflow-hidden mb-4">
                            <div class="row g-0">
                                <div class="col-sm-4 position-relative bg-position-center bg-repeat-0 bg-size-cover" style="background-image: url(assets/img/blog/03.jpg); min-height: 15rem;">
                                    <a href="{{route('mainhome.viewPost', ['channle'=>\App\Http\Controllers\coreChannle::getUsername($list->channle_id),'id'=>$list->id])}}" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">{{$list->category}}</a>
                                            <span class="fs-sm text-muted border-start ps-3 ms-3">{{\App\Http\Controllers\ConvertTime::getTimeDate($list->created_at)}}</span>
                                        </div>
                                        <h3 class="h4">
                                            <a href="{{route('mainhome.viewPost', ['channle'=>\App\Http\Controllers\coreChannle::getUsername($list->channle_id),'id'=>$list->id])}}">{{$list->title}}</a>
                                        </h3>
                                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                                            {{ strip_tags($list->content) }}
                                        </span>
                                        <hr class="my-4">
                                        @php
                                            $getChannleInfo = \App\Http\Controllers\coreChannle::getAllInfo($list->channle_id);
                                        @endphp
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                                                <img src="{{asset('storage/avatar_channle/'.$getChannleInfo->avatar)}}" class="rounded-circle me-3" width="48" alt="Avatar">
                                                {{$getChannleInfo->name}} @if($getChannleInfo->verified)<i class='bx bxs-badge-check text-primary' style="margin-left: 3px;"></i>@endif
                                            </a>
                                            <div class="d-flex align-items-center text-muted">
                                                <div class="d-flex align-items-center me-3">
                                                    <i class="bx bx-vision fs-lg me-1"></i>
                                                    <span class="fs-sm">{{$list->total_views}}</span>
                                                </div>
                                                <div class="d-flex align-items-center me-3">
                                                    <i class="bx bx-like fs-lg me-1"></i>
                                                    <span class="fs-sm">{{$list->total_likes}}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="bx bx-comment fs-lg me-1"></i>
                                                    <span class="fs-sm">{{$list->total_comments}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endif

                @endforeach
            @endif
        @endif
    @endif
</div>

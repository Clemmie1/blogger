<div wire:init="getPosts">
    @if(!is_null($loadData))
        @foreach($loadData as $list)
            @if(!$list->private)
                <article class="card border-0 shadow-sm overflow-hidden mb-4">
                    <div class="row g-0">
                        <div class="col-sm-4 position-relative bg-position-center bg-repeat-0 bg-size-cover" style="background-image: url(assets/img/blog/01.jpg); min-height: 15rem;">
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <a class="badge fs-sm text-nav bg-secondary text-decoration-none">{{$list->category}}</a>
                                    <span class="fs-sm text-muted border-start ps-3 ms-3">{{\App\Http\Controllers\ConvertTime::getTimeDate($list->created_at)}}</span>
                                </div>
                                <h3 class="h4">
                                    <a href="{{route('mainhome.viewPost', ['channle'=>\App\Http\Controllers\coreChannle::getUsername($list->channle_id),'id'=>$list->id])}}">{{$list->title}}</a>
                                </h3>
                                <span class="d-inline-block text-truncate" style="max-width: 250px;">
                                {{ strip_tags($list->content) }}
                            </span>
                                <hr class="my-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                                        @php
                                            $getChannleInfo = \App\Http\Controllers\coreChannle::getAllInfo($list->channle_id);
                                        @endphp
                                        <img src="{{asset('storage/avatar_channle/'.$getChannleInfo->avatar)}}" class=" me-3" width="48" alt="Avatar">
                                        {{$getChannleInfo->name}} @if($getChannleInfo->verified)<i class='bx bxs-badge-check text-primary' style="margin-left: 3px;"></i>@endif
                                    </a>
                                    <div class="d-flex align-items-center text-muted">
                                        <div class="d-flex align-items-center me-3">
                                            <i class="bx bx-low-vision fs-lg me-1"></i>
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
            <button class="btn btn-lg btn-outline-secondary  w-100 mt-4" wire:click="loadMore" wire:target="loadMore" wire:loading.remove>
                <i class="bx bx-down-arrow-alt fs-xl me-2"></i>
                Показать больше
            </button>
            <button class="btn btn-lg btn-outline-secondary  w-100 mt-4" disabled wire:loading wire:target="loadMore">
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Показать больше
            </button>
    @else
        <div class="d-block placeholder placeholder-wave mb-4" style="width: auto; height: 344.75px; border-radius: 0.5em"></div>
        <div class="d-block placeholder placeholder-wave mb-4" style="width: auto; height: 344.75px; border-radius: 0.5em"></div>
    @endif
</div>

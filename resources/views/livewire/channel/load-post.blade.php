<div>
    <div class="col-auto" wire:init="getListPost">

        @if(is_null($loadData))
            <div class="d-block placeholder placeholder-wave rounded mb-4" style="width: auto; height: 294.14px"></div>
            <div class="d-block placeholder placeholder-wave rounded mb-4" style="width: auto; height: 294.14px"></div>
        @else
            @if($notFound)
                <div class="text-center">
                    <i class="bx bxs-binoculars mb-4" style="font-size: 5em;"></i>
                    <h1 class="text-muted">Постов нет</h1>
                </div>
            @else
                @foreach($loadData as $list)
                    <article class="card me-auto mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <a class="badge fs-sm text-white bg-primary shadow-primary text-decoration-none">{{$list->category}}</a>
                            </div>
                            <h3 class="h4">
                                <a href="{{route('mainhome.viewPost', ['channle'=>\App\Http\Controllers\coreChannle::getUsername($list->channle_id),'id'=>$list->id])}}">{{$list->title}}</a>
                            </h3>
                            <p class="mb-4">
                                <span class="d-inline-block text-truncate" style="max-width: 400px;">
                                    {{ strip_tags($list->content) }}
                                </span>
                            </p>
                            <div class="d-flex align-items-center text-muted">
                                <div class="fs-sm border-end pe-3 me-3">Опубликовано {{\App\Http\Controllers\ConvertTime::convert($list->created_at, true)}}</div>
                                <div class="d-flex align-items-center me-3">
                                    <span class="fs-sm">Обновлено {{\App\Http\Controllers\ConvertTime::convert($list->updated_at, true)}}</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            @endif
        @endif

    </div>
</div>

<div>
    <section class="container mb-4 pt-lg-4 pb-lg-3">
        <h2 class="h1 text-center text-sm-start">Комментарии <span class="text-muted fs-lg">{{$totalComments}}</span></h2>

        <div class="row">
            @if($getComments->isEmpty())
                <span class="text-muted">Комментарий нет. Оставь его первым!</span>
            @else
                @foreach($getComments as $list)
                    <div class="col-lg-9">

                        <!-- Comment -->
                        <div class="py-4">
                            <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                                <div class="d-flex align-items-center me-3">
                                    <img src="https://ui-avatars.com/api/?rounded=true&color=ffff&background=346beb&name=KZ" class="rounded-circle" width="48" alt="Avatar">
                                    <div class="ps-3">
                                        <h6 class="fw-semibold mb-0">{{\App\Models\User::where('id', $list->sender)->first()->first_name}} {{\App\Models\User::where('id', $list->sender)->first()->last_name}}</h6>
                                        <span class="fs-sm text-muted">{{\App\Http\Controllers\ConvertTime::convert($list->created_at, true)}}</span>
                                    </div>
                                </div>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    @if($list->sender == \Illuminate\Support\Facades\Auth::user()->id)
                                        <a class="nav-link fs-sm px-10" wire:click="deleteComment({{$list->id}})">
                                            <i class="bx bx-trash fs-lg me-2 text-danger"></i>
                                        </a>
                                    @endif
                                @endif
                            </div>
                            <p class="mb-0">{{$list->message}}</p>
                        </div>

                        <hr class="my-2">

                    </div>
                @endforeach
            @endif

            <!-- Comments -->
        </div>
    </section>


    <section class="container mb-4 pb-2 mb-md-5 pb-lg-5">
        <div class="row gy-5">

            <div class="col-lg-9">
                <div class="card p-md-5 p-4 border-0 bg-secondary">
                    <div class="card-body w-100 mx-auto px-0" style="max-width: 746px;">
                        <h2 class="mb-4 pb-3">Оставить комментарий</h2>
                        <form class="row gy-4 needs-validation" novalidate wire:submit.prevent="sendComment({{$postId}})">
                            <div class="col-12">
                                <textarea wire:model="msgComment" class="form-control form-control-lg" rows="3" placeholder="Напишите свой комментарий здесь..."></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg btn-primary w-sm-auto w-100 mt-2">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

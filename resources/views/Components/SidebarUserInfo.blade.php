<aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
    <div class="position-sticky top-0">
        <div class="text-center pt-5">
            <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
                <img src="https://ui-avatars.com/api/?rounded=true&color=ffff&background=346beb&name={{urlencode($info->first_name)}}{{urlencode($info->last_name)}}" class="d-block rounded-circle" width="120" alt="John Doe">
                <button type="button" class="btn btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 end-0 mt-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change picture">
                    <i class="bx bx-refresh"></i>
                </button>
            </div>
            <h2 class="h5 mb-1">{{$info->first_name}} {{$info->last_name}}</h2>
            <p class="mb-3 pb-3">{{$info->email}}</p>
            <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                <i class="bx bxs-user-detail fs-xl me-2"></i>
                Меню аккаунта
                <i class="bx bx-chevron-down fs-lg ms-1"></i>
            </button>
            <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
                <a href="account-notifications.html" class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('my/channle') ? 'active' : '' }}">
                    <i class="bx bx-chalkboard fs-xl opacity-60 me-2"></i>
                    Мои каналы
                </a>
                <a href="account-notifications.html" class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('my/settings') ? 'active' : '' }}">
                    <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
                    Настройки
                </a>
            </div>
        </div>
    </div>
</aside>

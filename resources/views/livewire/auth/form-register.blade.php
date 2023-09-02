<div>
    <form class="needs-validation mb-2" novalidate wire:submit.prevent="reg">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-floating mb-4">
                    <input wire:model="firstName" class="form-control" type="text" id="fl-text" placeholder="" required>
                    <label for="fl-text">Имя</label>
                    @error('firstName') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-4">
                    <input wire:model="lastName" class="form-control" type="text" id="fl-text" placeholder="" required>
                    <label for="fl-text">Фамилия</label>
                    @error('lastName') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="form-floating mb-4">
            <input wire:model="email" class="form-control" type="email" placeholder="" required>
            <label for="fl-text">Почта</label>
            @error('email') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
        </div>
        <div class="form-floating mb-4">
            <input wire:model="password" class="form-control" type="password" placeholder="" required>
            <label for="fl-text">Пароль</label>
            @error('password') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary bg-gradient btn-lg w-100" wire:target="reg" wire:loading.remove>Зарегистрироваться</button>
        <button type="submit" class="btn btn-primary bg-gradient btn-lg w-100 placeholder placeholder-wave disabled" wire:loading wire:target="reg">Зарегистрироваться</button>
    </form>
</div>

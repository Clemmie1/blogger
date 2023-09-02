<div>
    <form class="needs-validation mb-2" novalidate wire:submit.prevent="login">
        <div class="form-floating mb-4">
            <input wire:model="email" class="form-control" type="email" placeholder="Почта" required>
            <label for="fl-text">Почта</label>
            @error('email') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
        </div>
        <div class="form-floating mb-4">
            <input wire:model="password" class="form-control" type="password" placeholder="Пароль" required>
            <label for="fl-text">Пароль</label>
            @error('password') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary bg-gradient btn-lg w-100" wire:target="login" wire:loading.remove>Войти</button>
        <button type="button" class="btn btn-primary bg-gradient btn-lg w-100 placeholder placeholder-wave disabled" wire:loading wire:target="login">Войти</button>
    </form>
</div>

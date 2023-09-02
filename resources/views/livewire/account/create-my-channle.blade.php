<div>
    <form wire:submit.prevent="createChannle" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-floating mb-4">
                <input wire:model="username" class="form-control" type="text" id="fl-text" placeholder="Имя канала" >
                <label for="fl-text">Название канала</label>
                @error('username') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
            <div class="form-floating mb-4">
                <input wire:model="name" class="form-control" type="text" id="fl-text" placeholder="Your name" >
                <label for="fl-text">Название канала</label>
                @error('name') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="file-input" class="form-label">Аватарка</label>
                <input wire:model="avatar" class="form-control" type="file" id="file-input" >
                @error('avatar') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal">Отмена</button>
            <button class="btn btn-primary btn-sm" type="submit" wire:target="createChannle">Создать</button>
        </div>
    </form>
</div>

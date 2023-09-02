<div>
    <form wire:submit.prevent="create" enctype="multipart/form-data">
        <div class="row pb-2">
            <div class="col-sm-6 mb-4">
                <label for="fn" class="form-label fs-base">Название</label>
                <input wire:model="title" type="text" id="fn" class="form-control form-control-lg" placeholder="Введите название">
                @error('title') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
            <div class="col-sm-6 mb-4">
                <label for="state" class="form-label fs-base">Категория</label>
                <select wire:model="category" id="state" class="form-select form-select-lg">
                    <option  selected disabled>Выберите категорию поста</option>
                    <option value="Игры">Игры</option>
                    <option value="Крипта">Крипта</option>
                    <option value="Новости">Новости</option>
                    <option value="Мир">Мир</option>
                </select>
                @error('category') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="file-input" class="form-label">Аватарка</label>
                <input wire:model="banner" class="form-control form-select-lg" type="file" id="file-input" >
                @error('banner') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
            <div class="col-12 mb-4" >
                <label for="bio" class="form-label fs-base">Контент</label>
                <div wire:ignore>
                    <textarea wire:model="content" id="content" class="form-control form-control-lg bg-white" rows="20" readonly></textarea>
                </div>
                @error('content') <span class="text-danger fs-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="d-flex mb-3">
            <button type="submit" class="btn btn-primary w-100" wire:target="create">Создать</button>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        $('#content').summernote({
            placeholder: 'Сюда Ваш контетн',
            tabsize: 20,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],

            callbacks: {
                onChange: function(content, $editable) {
                    @this.set('content', content);
                }
            }
        });
    </script>
@endpush

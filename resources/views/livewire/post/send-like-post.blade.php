<div>
    <button class="btn btn-lg btn-secondary" wire:click="sendLike({{$postId}})">
        <i class="bx bx-like me-2 lead"></i>
        Нравится
        <span class="badge bg-secondary mt-n1 ms-3">{{$likes}}</span>
    </button>
</div>

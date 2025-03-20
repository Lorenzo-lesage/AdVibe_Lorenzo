<div class="wish-list-icon">
    <button wire:click="toggleSavedArticles" class="border-0 bg-transparent">
        @if ($isFavorite)
            <div class="heart-fill">
                <i class="bi bi-heart-fill text-danger fs-2 heart-fill"></i> <!-- Cuore pieno -->
            </div>
        @else
            <div class="heart">
                <i class="bi bi-heart fs-2 heart"></i> <!-- Cuore vuoto -->
            </div>
        @endif
    </button>
</div>

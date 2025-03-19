<div class="wish-list-icon">
    <button wire:click="toggleSavedArticles" class="border-0 bg-transparent">
        @if ($isFavorite)
            <i class="bi bi-heart-fill text-danger fs-5 fw-bold"></i> <!-- Cuore pieno -->
        @else
            <i class="bi bi-heart fs-5 "></i> <!-- Cuore vuoto -->
        @endif
    </button>
</div>

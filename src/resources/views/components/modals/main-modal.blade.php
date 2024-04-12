<div class="hystmodal" id="{{ $modalId }}" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window" role="dialog" aria-modal="true">
            <button data-hystclose class="hystmodal__close">Закрыть</button>
            <div class="modal-container">
                <h3 class="modal-title">{{ $modalTitle }}</h3>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

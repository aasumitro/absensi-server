<form wire:submit.prevent="submit">
    @if(!$user)
        @include('components.input.username-input', ['isReadOnly' => false])
    @endif

    @if($user)
        @include('components.input.one-time-password-input')
    @endif

    <div class="d-grid">
        <button
            type="submit"
            class="btn btn-dark"
        >Lanjutkan</button>
    </div>
</form>

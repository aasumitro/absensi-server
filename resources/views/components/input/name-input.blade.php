<div class="form-group mb-4">
    <label for="name">Nama lengkap Anda</label>
    <div class="input-group">
        <span class="input-group-text" id="name_icon">
            <span class="fas fa-user"></span>
        </span>
        <input
            id="name"
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            placeholder="e.g. ungke inthesekay"
            wire:model="name"
            autofocus
            required
        >
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


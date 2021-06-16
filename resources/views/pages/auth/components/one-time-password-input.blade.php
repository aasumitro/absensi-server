<div class="mb-4 text-center">
    <label for="one-time-password">
        Enter the verification code
        <span class="d-block fw-light">
            The verification code has been sent via TelegramBot
        </span>
    </label>
    <input
        id="one-time-password"
        class="one-time-password  @error('password') is-invalid @enderror"
        maxlength='7'
        wire:model="password"
    />

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="d-flex justify-content-center align-items-center mb-4">
    <span class="fw-normal d-none" id="resend-button">
        Didn't get the code?
        <a
            wire:click="resend"
            class="fw-bold"
        >Resend!</a>
    </span>
    <span
        class="d-inline fw-bold"
        id="counting-before-retry"
    >Resend in : 00:00</span>
</div>

<script>
    @if($resend_hold_time)
        let resendRemainingTime = parseInt(`{{$resend_hold_time}}`) * 60 * 1000

        let counting = setInterval(() => {
            resendRemainingTime -= 1000

            let seconds = Math.floor((resendRemainingTime / 1000) % 60)
            let minutes = Math.floor((resendRemainingTime / (1000 * 60)) % 60)
            seconds = (seconds < 10) ? "0" + seconds : seconds
            minutes = (minutes < 10) ? "0" + minutes : minutes

            let countingSection = document
                .getElementById('counting-before-retry')
            let trySendOTPButton = document
                .getElementById('resend-button')

            countingSection.innerHTML = `Resend in : ${minutes}:${seconds}`

            if (minutes === "00" && seconds === '00') {
                clearInterval(counting)
                countingSection.classList.add("d-none")
                trySendOTPButton.classList.remove("d-none")
            }
        }, 1000)
    @else
        document
            .getElementById('resend-button')
            .classList
            .remove("d-none")
    @endif
</script>





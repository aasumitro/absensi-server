<?php

namespace App\Http\Livewire\Auth;

use App\Actions\CreateAccessCodeAction;
use App\Events\SecretCodeEvent;
use App\Traits\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LoginActionForm extends Component
{
    use AuthenticatesUsers;

    public $user;

    public $username, $password;

    public function render()
    {
        return view('livewire.auth.login-action-form');
    }

    public function resend()
    {
        $this->dispatchBrowserEvent('recountingTime', ['next_time' => 3]);

        event(new SecretCodeEvent($this->user));
    }

    /**
     * @throws ValidationException
     */
    public function submit(): void
    {
        if ($this->user) {
            $this->attemptLogin();
            return;
        }

       $this->validateLogin();
    }

    /**
     * @throws ValidationException
     */
    private function validateLogin()
    {
        $this->validate(
            ['username' => 'required|string|exists:users,username'],
            ['username.exists' => 'These credential do not match our records.']
        );

        $this->user = (new CreateAccessCodeAction())->execute($this->username);

        $this->dispatchBrowserEvent('recountingTime', ['next_time' => 1]);
    }

    /**
     * @throws ValidationException
     */
    private function attemptLogin()
    {
        $validatedData = $this->validate(['username' => 'required', 'password' => 'required']);
        $validatedData['remember'] = true;

        $request = Request();
        $request->request->add($validatedData);

        if ($this->user->isCodeValid($request->password)) {
            Auth::login($this->user, $request->remember);

            $this->user->destroySecretCode();

            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
}

<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="password-reset-form">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group mt-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
        </div>

        <div class="d-flex justify-content-end mt-4">
            <x-primary-button class="btn btn-primary">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<style>
    /* General Styling */
.password-reset-form {
    width: 100%;
    max-width: 500px;
    background-color: #2B7A78;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: bold;
    color: #FEFFFF;
}

.input-group {
    width: 100%;
}

.input-group-text {
    background-color: #17252A;
    color: #FEFFFF;
}

.form-control {
    background-color: #FFFFFF;
    color: #000000;
    border-radius: 0.375rem;
    border: 1px solid #ccc;
    padding: 10px;
    font-size: 1rem;
}

.form-control:focus {
    border-color: #2B7A78;
    outline: none;
}

.form-check-label {
    color: #FEFFFF;
}

.btn-primary {
    background-color: #2B7A78;
    color: #FEFFFF;
    border: none;
    padding: 10px;
    font-size: 1.1rem;
    border-radius: 8px;
}

.btn-primary:hover {
    background-color: #17252A;
    color: #FEFFFF;
}

.error-message {
    color: #FF6B6B;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.d-flex {
    display: flex;
}

.justify-content-end {
    justify-content: flex-end;
}

.mt-4 {
    margin-top: 1.5rem;
}

.mb-3 {
    margin-bottom: 1rem;
}

.input-group-text i {
    font-size: 1.2rem;
}

</style>
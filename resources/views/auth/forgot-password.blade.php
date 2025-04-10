<x-guest-layout>
    <div class="mb-4 text-sm text-white">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <div class="d-flex justify-content-end mt-4">
            <x-primary-button class="btn btn-primary">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<style>

    /* Reset default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #3AAFA9;
    color: #FEFFFF;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin: 0;
}

/* Form Styling */
.login-form {
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
    background-color: #FFFFFF; /* Set background color to white */
    color: #000000; /* Set text color to black */
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
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="login-form">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label text-white">Name</label>
            <div class="input-group">
                <span class="input-group-text bg-dark text-white"><i class="bi bi-person-fill"></i></span>
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="error-message" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label text-white">Email Address</label>
            <div class="input-group">
                <span class="input-group-text bg-dark text-white"><i class="bi bi-envelope-fill"></i></span>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label text-white">Password</label>
            <div class="input-group">
                <span class="input-group-text bg-dark text-white"><i class="bi bi-lock-fill"></i></span>
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label text-white">Confirm Password</label>
            <div class="input-group">
                <span class="input-group-text bg-dark text-white"><i class="bi bi-lock-fill"></i></span>
                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('login') }}" class="text-sm text-white hover:text-gray-200">
                Already registered?
            </a>

            <x-primary-button class="btn btn-primary w-100">
                Register
            </x-primary-button>
        </div>
    </form>
        <!-- Go Back to Home Button -->
        <div class="mt-4">
        <a href="{{ route('welcome.index') }}" class="btn btn-link text-white text-decoration-none">
             Go back to Home
        </a>
    </div>

</x-guest-layout>

<style>
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

    .login-form {
        width: 100%;
        max-width: 500px;
        background-color: #2B7A78;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: bold;
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

    .justify-content-between {
        justify-content: space-between;
    }

    .w-100 {
        width: 100%;
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

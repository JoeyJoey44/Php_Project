<x-guest-layout>
    <div class="mb-4 text-sm text-white">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="login-form">
        @csrf

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <div class="d-flex justify-content-end mt-4">
            <x-primary-button class="btn btn-primary">
                {{ __('Confirm') }}
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

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 d-flex justify-content-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="btn btn-success">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-link text-decoration-none text-muted">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>

<style>
    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .text-sm {
        font-size: 0.875rem;
    }

    .text-gray-600 {
        color: #4B5563;
    }

    .text-green-600 {
        color: #16A34A;
    }

    .text-muted {
        color: #6C757D;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .btn-success {
        background-color: #28A745;
        color: #FFFFFF;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 0.375rem;
    }

    .btn-link {
        background-color: transparent;
        border: none;
        color: #6C757D;
        text-decoration: underline;
        font-size: 1rem;
        padding: 0;
    }

    .btn-link:hover {
        color: #007BFF;
    }
</style>

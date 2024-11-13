<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('check') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="code" :value="__('Verification')" />
            <x-text-input id="code" class="block mt-1 w-full" type="number" name="code" />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Verify') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

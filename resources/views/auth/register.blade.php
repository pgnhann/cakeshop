<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Phone Number -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Số điện thoại')" />

                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required auto focus/>
            </div>

            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" :value="__('Tên người dùng')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Họ và tên')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mật khẩu')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <input type="hidden" name="password_plain" id="password_plain">
                
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Bạn đã có tài khoản?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Đăng ký') }}
                </x-button>
            </div>
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var passwordInput = document.getElementById('password');
                var passwordPlainInput = document.getElementById('password_plain');
                passwordInput.addEventListener('input', function() {
                    passwordPlainInput.value = passwordInput.value;
                });
            });
        </script>
    </x-auth-card>
</x-guest-layout>

@extends('components.app')

@section('content')

<div class="flex flex-row w-screen h-dvh bg-[#E6F7F9]">
    <div class="w-1/2 hidden lg:flex h-dvh bg-[#17A2B8] rounded-br-[550px] justify-center items-center">
        <h1 class="text-[clamp(0.9rem,4.4vw,10rem)] font-bold leading-[70px] mb-24 text-[#FDF6EC]">
            Clinic Inventory <br> Management System
        </h1>
    </div>

    <!-- Right Side -->
    <div class="flex items-center justify-center lg:w-1/2 w-full h-dvh">
        <div class="border rounded-[15px] h-fit max-w-[380px] w-full p-8 bg-[#FDF6EC] border-[#17A2B8]">
            <x-form-header-auth>Sign In</x-form-header-auth>
            <form class="flex flex-col w-full h-full gap-5" method="POST" action="/">
                @csrf
                @method('POST')

                <x-input
                    placeholder="Username"
                    name="username"
                    value="{{ old('username') }}"
                    required>
                </x-input>
                @error('username')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror

                <x-input
                    placeholder="Password"
                    type="password"
                    name="password"
                    required>
                </x-input>
                @error('password')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror

                <div class="flex gap-4">
                    <x-button-form type="submit">Log in</x-button-form>
                    {{-- <div class="flex flex-col font-bold text-[13px] underline decoration-[#FD7E14] decoration-[1px]">
                        <a href="/signup">Sign Up</a>
                        <a href="/forgotpassword">Forgot Password?</a>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

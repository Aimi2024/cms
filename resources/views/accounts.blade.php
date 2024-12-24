<x-layout>
    <div class="w-full h-dvh flex flex-col gap-10 p-10 overflow-hidden">
        <h1 class="font-bold text-[clamp(0.9rem,5vw,3.5rem)] text-left">Create Account</h1>

        <div class="w-full h-dvh flex flex-col items-center">
            <form class="flex gap-40" method="POST" action="{{ route('accounts.store') }}">
                @csrf
                @method("POST")

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-1">
                        <label for="name" class="font-bold">Account Username</label>
                        <input id="name" name="name" type="text"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="Email" class="font-bold">Email</label>
                        <input id="Email" name="email" type="email"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-1">
                        <label for="Password" class="font-bold">Account Password</label>
                        <input id="Password" name="password" type="password"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="PasswordConfirm" class="font-bold">Confirm Password</label>
                        <input id="PasswordConfirm" name="password_confirmation" type="password"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="Type" class="font-bold">Account Type</label>
                        <select id="Type" name="type"
                            class="bg-transparent px-3 py-2 outline-none border border-[#707070] rounded-lg bg-white">
                            <option value="volvo" hidden>Account Type</option>
                            <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        @error('type')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-row gap-5">
                        <a href="{{ route('medicine.index') }}"
                            class="border border-[#707070] p-2 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none flex items-center justify-center">No</a>
                        <button
                            class="bg-[#FD7E14] text-xs p-2 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black flex items-center justify-center">Create
                            Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>

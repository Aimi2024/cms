<x-layout>
    <div class="w-full h-dvh flex flex-col gap-5 md:gap-10 md:p-10 overflow-hidden items-center">

        <h1 class="font-bold text-[clamp(2rem,5vw,3.5rem)] flex items-start w-full px-5">Update Account</h1>

        <!-- Display a success message if available -->
        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4 border-l-4 border-green-500">
            {{ session('success') }}
        </div>
        @endif

        <!-- Display a general error message if there are any -->
        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="grid grid-cols-1 sm:grid-cols-2 gap-10 w-full lg:w-[55%] px-10 pb-10 md:px-0 overflow-x-auto"
            method="POST" action="{{ route('accounts.update', $user) }}">
            @csrf
            @method("PUT")

            <div class="flex flex-col gap-1">
                <label for="name" class="font-bold">Account Username</label>
                <input id="name" name="name" type="text"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg" value="{{ $user->username }}">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="Email" class="font-bold">Email</label>
                <input id="Email" name="email" type="email"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg" value="{{ $user->email}}">
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

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
                    <option value="admin" {{ old('type', $user->type) == 'admin' ? 'selected' : '' }}>Admin
                    </option>
                    <option value="user" {{ old('type', $user->type) == 'user' ? 'selected' : '' }}>User
                    </option>
                </select>
                @error('type')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-row gap-5 mt-7">
                <a href="{{ route('accounts.create') }} "
                    class="border border-[#707070] h-10 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none flex items-center justify-center">No</a>
                <button
                    class="bg-[#FD7E14] h-10 px-1 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black flex items-center justify-center"
                    type="submit">Update
                    Account</button>
            </div>

        </form>

    </div>
</x-layout>
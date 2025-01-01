<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        <!-- Success or Error Message -->
        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4 border-l-4 border-green-500">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4 border-l-4 border-red-500">
            {{ session('error') }}
        </div>
        @endif

        <div class="w-full flex flex-row items-center justify-end pr-10 h-5">
            <a href="{{ route('accounts.register') }}"
                class="hover:border hover:border-[#707070] hover:bg-white bg-[#FD7E14] px-3 py-2 flex items-start gap-3 rounded-3xl hover:text-[#FD7E14] text-white transition-all duration-300">
                <x-typ-plus class="w-6 h-6" />
                ADD NEW
            </a>
        </div>

        <!-- Search and Filter Section -->
        <div class="w-full flex items-center gap-9">
            {{-- <select
                class="bg-transparent outline-none border border-[#707070] rounded-lg bg-white px-2 py-1 text-center">
                <option value="volvo" hidden>10</option>
                <option value="saab">1</option>
                <option value="opel">2</option>
                <option value="audi">3</option>
            </select> --}}

            <form class="flex flex-row w-fit h-fit border border-[#707070] rounded-3xl bg-white px-2 items-center"
                action="{{ route('accounts.create') }}" method="GET">
                <input class="bg-transparent outline-none px-2" type="text" name="query" value="{{ request('query') }}"
                    placeholder="Search users...">
                <button class="border-l-2 p-1" type="submit">
                    <x-css-search />
                </button>
            </form>
        </div>

        <!-- Users Table -->
        <table class="text-center w-full">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->type) }}</td>
                    <td class="relative">
                        <a href="{{ route('accounts.edit', ['user' => $user->id]) }}" class="hover:underline">
                            <x-mdi-pencil class="text-blue-500 w-7 h-7 cursor-pointer absolute inset-0 m-auto" />
                        </a>

                        {{-- <form action="{{ route('accounts.delete', $user->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <x-mdi-minus-box-outline class="text-red-400 w-7 h-7" />
                        </button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-5">
            {{ $users->links() }}
        </div>
    </div>
</x-layout>

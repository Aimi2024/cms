<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        <!-- Success or Error Message -->
        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4 border-l-4 border-green-500 relative">
            {{ session('success') }}
            <button class="absolute top-2 right-2 text-green-800" onclick="this.parentElement.style.display='none'">
                <x-mdi-close class="w-6 h-6" />
            </button>
        </div>
    @elseif(session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4 border-l-4 border-red-500 relative">
            {{ session('error') }}
            <button class="absolute top-2 right-2 text-red-800" onclick="this.parentElement.style.display='none'">
                <x-mdi-close class="w-6 h-6" />
            </button>
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
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->type) }}</td>
                    <td>
                        @if($user->isOnline())
                            <span class="badge bg-green-500 text-white px-2 py-1 rounded">Online</span>
                        @else
                            <span class="badge bg-gray-400 text-white px-2 py-1 rounded">Offline</span>
                        @endif
                    </td>
                    <td class="relative px-4 py-2">
                        <a href="{{ route('accounts.edit', ['user' => $user->id]) }}" class="hover:underline inline-block">
                            <x-mdi-pencil class="text-blue-500 w-7 h-7 cursor-pointer" />
                        </a>

                        <form id="delete-form-{{ $user->id }}" action="{{ route('accounts.destroy', $user->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $user->id }})">
                                <x-mdi-delete class="text-red-400 w-7 h-7" />
                            </button>
                        </form>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(equipmentId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + equipmentId).submit();
        }
    });
}
</script>
</x-layout>



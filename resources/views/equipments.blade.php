<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">

        <!-- Notification Section -->
        @if(session('success'))
            <div class="alert alert-success bg-green-500 text-white px-4 py-2 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full h-20 flex flex-row items-center justify-end gap-8 pr-10">
            <a href="{{ route('equipmentdeducted.index') }}"
                class="border border-[#707070] py-1 px-3 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300 rounded-2xl">
                Deducted Stock
            </a>

            <a href="{{ route('equipment.add') }}" class="border border-[#707070] w-8 h-8 text-[#FD7E14]
                hover:bg-[#FD7E14] hover:text-white hover:border-none transition
                duration-300 rounded-lg flex justify-center items-center">
                <x-typ-plus class="w-6 h-6" />
            </a>
        </div>

        <div class="w-full flex items-center gap-9">
            <div class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center">
                <form action="{{ route('equipment.index') }}" method="GET">
                    <!-- Search input only -->
                    <div class="flex items-center">
                        <form action="{{ route('equipment.index') }}" method="GET" class="flex items-center">
                            <input class="bg-transparent outline-none px-1 w-40 text-left" type="text" name="query" placeholder="Search..." value="{{ request('query') }}">
                            <button type="submit" class="flex items-center justify-center p-2">
                                <x-css-search />
                            </button>
                        </form>
                    </div>


                </form>
            </div>
        </div>

        <table class="text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Date Arrived</th>
                    <th>Service Life End</th> <!-- Added the column for service life end -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipments as $equipment)
                <tr>
                    <td>{{ $equipment->eq_name }}</td>
                    <td>{{ $equipment->stock }}</td>
                    <td>{{ $equipment->eq_da }}</td>
                    <td>{{ $equipment->service_life_end ?? 'N/A' }}</td>
                    <td class="flex justify-center items-center gap-3">
                        <a href="{{ route('equipment.deduct', $equipment->eq_id) }}" class="flex justify-center items-center">
                            <x-mdi-minus-box-outline class="text-red-400 w-7 h-7" />
                        </a>
                        <form action="{{ route('equipment.destroy', $equipment->eq_id) }}" method="POST" class="inline" id="delete-form-{{ $equipment->eq_id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="flex justify-center items-center" onclick="confirmDelete({{ $equipment->eq_id }})">
                                <x-mdi-delete class="text-red-400 w-7 h-7" />
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $equipments->links() }}
    </div>

    <!-- SweetAlert2 Script -->
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

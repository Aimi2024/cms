<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">

        <!-- Notification Section -->
        @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white px-4 py-2 rounded-lg relative">
            {{ session('success') }}
            <button class="absolute top-2 right-2 text-white" onclick="this.parentElement.style.display='none'">
                <x-mdi-close class="w-6 h-6" />
            </button>
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

        <div class="w-full flex h-10 items-center">
            <!-- Search input only -->
            <form action="{{ route('equipment.index') }}" method="GET"
                class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center">
                <input class="bg-transparent outline-none px-1" type="text" name="query" placeholder="Search..."
                    value="{{ request('query') }}">
                <button type="submit" class="flex items-center justify-center px-1">
                    <x-css-search />
                </button>
            </form>
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
                    <td
                    class="px-4 py-2 @if($equipment->stock == 0) line-through decoration-red-500 text-red-500 @elseif($equipment->service_life_end && \Carbon\Carbon::parse($equipment->service_life_end)->isPast()) text-red-500 @endif">
                    {{ $equipment->eq_name }}
                </td>
                <td
                    class="px-4 py-2 @if($equipment->stock == 0) line-through decoration-red-500 text-red-500 @elseif($equipment->service_life_end && \Carbon\Carbon::parse($equipment->service_life_end)->isPast()) text-red-500 @endif">
                    {{ $equipment->stock }}
                </td>
                <td
                    class="px-4 py-2 @if($equipment->stock == 0) line-through decoration-red-500 text-red-500 @elseif($equipment->service_life_end && \Carbon\Carbon::parse($equipment->service_life_end)->isPast()) text-red-500 @endif">
                    {{ $equipment->eq_da }}
                </td>
                <td
                    class="px-4 py-2 @if($equipment->stock == 0) line-through decoration-red-500 text-red-500 @elseif($equipment->service_life_end && \Carbon\Carbon::parse($equipment->service_life_end)->isPast()) text-red-500 @endif">
                    {{ $equipment->service_life_end ?? 'N/A' }}
                </td>

                    <td class="relative px-4 py-2">
                        <a href="{{ route('equipment.deduct', $equipment->eq_id) }}" class="inline-block">
                            <x-mdi-minus-box-outline class="text-red-400 w-7 h-7" />
                        </a>
                        <form action="{{ route('equipment.destroy', $equipment->eq_id) }}" method="POST"
                            class="inline-block ml-2" id="delete-form-{{ $equipment->eq_id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="text-red-500 hover:text-red-700"
                                onclick="confirmDelete({{ $equipment->eq_id }})">
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

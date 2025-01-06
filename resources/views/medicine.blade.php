<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        <!-- Success Notification -->
        @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4 border-l-4 border-green-500 relative">
        {{ session('success') }}
        <button class="absolute top-2 right-2 text-green-800" onclick="this.parentElement.style.display='none'">
            <x-mdi-close class="w-6 h-6" />
        </button>
    </div>
@endif

        <div class="w-full h-20 flex flex-row items-center justify-end gap-8 pr-10">
            <a href="{{ route('medicinededucted.index') }}"
                class="border border-[#707070] py-1 px-3 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300 rounded-2xl">
                Deducted Medicine
            </a>

            <a href="{{ route('medicine.add') }}"
                class="border border-[#707070] w-8 h-8 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300 rounded-lg flex justify-center items-center">
                <x-typ-plus class="w-6 h-6" />
            </a>
        </div>

        <!-- Search & Filter Section -->
        <div class="w-full flex items-center gap-9">
            <form class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center"
                action="{{ route('medicine.index') }}" method="GET">
                <input class="bg-transparent outline-none px-1" name="query" type="text" value="{{ request('query') }}"
                    placeholder="Search medicine...">
                <button type="submit">
                    <x-css-search />
                </button>
            </form>


        </div>

        <!-- Medicines Table -->
        <table class="w-full mt-6">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Added</th>
                    <th>Stock</th>
                    <th>Expiration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicines as $medicine)
                <tr>
                    <td
                    class="px-4 py-2 @if($medicine->m_stock == 0) line-through decoration-red-500 text-red-500 @elseif($medicine->isExpired()) text-red-500 @endif">
                    {{ $medicine->m_name }}
                </td>
                <td
                    class="px-4 py-2 @if($medicine->m_stock == 0) line-through decoration-red-500 text-red-500 @elseif($medicine->isExpired()) text-red-500 @endif">
                    {{ $medicine->m_da }}
                </td>
                <td
                    class="px-4 py-2 @if($medicine->m_stock == 0) line-through decoration-red-500 text-red-500 @elseif($medicine->isExpired()) text-red-500 @endif">
                    {{ $medicine->m_stock }}
                </td>
                <td
                    class="px-4 py-2 @if($medicine->m_stock == 0) line-through decoration-red-500 text-red-500 @elseif($medicine->isExpired()) text-red-500 @endif">
                    {{ $medicine->m_date_expired }}
                </td>
                    <td class="relative px-4 py-2">
                        <!-- Deduct Medicine Action -->
                        <a href="{{ route('medicine.deductshow', $medicine->m_id) }}" class="inline-block">
                            <x-mdi-minus-box-outline class="text-red-400 w-7 h-7" />
                        </a>

                        <!-- Delete Medicine Action -->
                        <form action="{{ route('medicine.destroy', $medicine->m_id) }}" method="POST"
                            class="inline-block ml-2" id="delete-form-{{ $medicine->m_id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="text-red-500 hover:text-red-700"
                                onclick="confirmDelete({{ $medicine->m_id }})">
                                <x-mdi-delete class="w-7 h-7" />
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-center">
            {!! $medicines->links() !!}
        </div>
    </div>

    <!-- JavaScript for confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(medicineId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + medicineId).submit();
                }
            });
        }
    </script>
</x-layout>

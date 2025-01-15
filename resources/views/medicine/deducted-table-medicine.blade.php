<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        @auth
        @if(auth()->user()->type === 'admin')
        <div class="w-full h-20 flex flex-row items-center justify-end pr-10">
            <a href="{{ route('download.pdf') }}"  {{-- Update route to your PDF download route --}}
            class="border border-[#707070] w-8 h-8 m-2 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300 rounded-lg flex justify-center items-center">
            <x-typ-download class="w-6 h-6" />  {{-- Download icon --}}
        </a>
            <a href="{{ route('medicine.add') }}"
                class="border border-[#707070] w-8 h-8 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300 rounded-lg flex justify-center items-center">
                <x-typ-plus class="w-6 h-6" />
            </a>

        </div>
   @endif
                @endauth
        <!-- Flash Message Notification -->
        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @elseif (session('error'))
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        <!-- Search and Medicine Table Section -->
        <div class="w-full flex items-center gap-9">
            <form action="{{ route('medicinededucted.index') }}" method="GET"
                class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center">
                <input class="bg-transparent outline-none px-1" name="query" type="text" value="{{ request('query') }}"
                    placeholder="Search medicine...">
                <button>
                    <x-css-search />
                </button>
            </form>

        </div>

        <table class="text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Added</th>
                    <th>Stock Deducted</th>
                    <th> Deducted By</th>
                    <th>Reason</th>
                    <th>Deducted Date</th>
                    @auth
                    @if(auth()->user()->type === 'admin')
                    <th>Actions</th>
                    @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($medicinededucted as $medicine)
                <tr>
                    <td>{{ $medicine->medicine_name }}</td>
                    <td>{{ $medicine->created_at }}</td>
                    <td>{{ $medicine->quantity_deducted }}</td>
                    <td>{{ $medicine->addedBy->username ?? 'N/A' }}</td>
                    <td>{{ $medicine->medicine_deduct_reason}}</td>

                    <td>{{ $medicine->deducted_at }}</td>

                    @auth
                    @if(auth()->user()->type === 'admin')
                    <td class="relative">
                        <form id="delete-form-{{ $medicine->id }}" action="{{ route('medicine.delete', ['deductedMedicine' => $medicine->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDeleteMedicine({{ $medicine->id }})" class="text-red-400 w-7 h-7">
                                <x-mdi-delete class="w-7 h-7" />
                            </button>
                        </form>
                    </td>
                    @endif
                    @endauth
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                @if($totalDeducted->isNotEmpty())
            @foreach($totalDeducted as $total)
                <tr>
                    <td></td>
                    <td><strong>Total for {{ $total->medicine_name }}:</strong></td>
                    <td><strong>{{ $total->total }}</strong></td>
                    <td colspan="3"></td>
                </tr>
            @endforeach
        @endif
            </tfoot>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-center">
            {!! $medicinededucted->links() !!}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteMedicine(medicineId) {
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

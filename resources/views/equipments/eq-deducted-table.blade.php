<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        <!-- Flash Message Notification -->
        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Deleted!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        @auth
        @if(auth()->user()->type === 'admin')
        <div class="w-full h-20 flex flex-row items-center justify-end pr-10">
            <a href="{{ route('downloadeq.pdf') }}"  {{-- Update route to your PDF download route --}}
            class="border border-[#707070] w-8 h-8 m-2 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300 rounded-lg flex justify-center items-center">
            <x-typ-download class="w-6 h-6" />  {{-- Download icon --}}
        </a>
            <a href="{{ route('equipment.add') }}"
                class="border border-[#707070] w-8 h-8 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300 rounded-lg flex justify-center items-center">
                <x-typ-plus class="w-6 h-6" />
            </a>
        </div>
        @endif
        @endauth
        <form method="GET" action="{{ route('equipmentdeducted.index') }}" class="w-full flex items-center gap-9">
            <div class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center">
                <input class="bg-transparent outline-none px-1" type="text" name="query" value="{{ request('query') }}"
                    placeholder="Search equipment...">
                <button>
                    <x-css-search />
                </button>
            </div>


        </form>

        <table class="text-center w-full mt-5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Stock Deducted</th>
                    <th>Deduct By</th>
                    <th>Reason</th>
                    <th>Date Arrived</th>
                    <th>Service Life End</th> <!-- Added the column for service life end -->
                    @auth
                    @if(auth()->user()->type === 'admin')
                    <th>Actions</th>
                    @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($equipmentdeducted as $equipment)
                <tr>
                    <td>{{ $equipment->eqd_name }}</td>
                    <td>{{ $equipment->eqd_stock_deducted }}</td>
                    <td>{{ $equipment->addedBy->username ?? 'N/A' }}</td>
                    <td>{{ $equipment->eq_deduc_reason }}</td>
                    <td>{{ $equipment->eq_da }}</td>
                    <td>{{ $equipment->eqd_date_deducted ?? 'N/A' }}</td>
                    @auth
                    @if(auth()->user()->type === 'admin')
                    <td class="relative">

                        <form id="delete-form-{{ $equipment->eqd_id }}" action="{{ route('equipmentdeducted.destroy', $equipment->eqd_id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $equipment->eqd_id }})">
                                <x-mdi-delete class="text-red-400 w-7 h-7" />
                            </button>
                        </form>
                    </td>
                    @endif
                    @endauth
                </tr>
                @endforeach
            </tbody>
            @if($query && $totalDeducted->isNotEmpty())
            <tfoot>
                @foreach($totalDeducted as $total)
                    <tr>
                        <td><strong>Total for {{ $total->eqd_name }}:</strong></td>
                        <td><strong>{{ $total->total }}</strong></td>
                        <td colspan="3"></td>
                    </tr>
                @endforeach
            </tfoot>
        @endif
        </table>

        <!-- Pagination -->
        <div class="mt-5">
            {{ $equipmentdeducted->links() }}
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

<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        <div class="w-full h-20 flex flex-row items-center justify-end pr-10">
            <a href="{{ route('equipment.add') }}"
                class="border border-[#707070] p-1 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300">
                <x-typ-plus class="w-6 h-6" />
            </a>
        </div>

        <div class="w-full flex items-center gap-9">
            <form method="GET" action="{{ route('equipmentdeducted.index') }}" class="flex gap-2">
                <div class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center">
                    <input class="bg-transparent outline-none px-1" type="text" name="query" value="{{ request('query') }}" placeholder="Search equipment...">
                    <button>
                        <x-css-search />
                    </button>
                </div>

                <button type="submit" class="transition-all duration-300 bg-[#FD7E14] rounded-lg py-1 px-4 text-white hover:bg-white hover:text-black hover:border hover:border-[#707070]">
                    Apply filter
                </button>
            </form>
        </div>

        <table class="text-center w-full mt-5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Expiration Date</th>
                    <th>Service Life End</th> <!-- Added the column for service life end -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipmentdeducted as $equipment)
                <tr>
                    <td>{{ $equipment->eqd_name }}</td>
                    <td>{{ $equipment->eqd_stock_deducted }}</td>
                    <td>{{ $equipment->eq_da }}</td>
                    <td>{{ $equipment->eqd_date_deducted ?? 'N/A' }}</td> <!-- Display service life end, or N/A if not set -->
                    <td class="relative">

                        <form action="{{ route('equipmentdeducted.destroy', $equipment->eqd_id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <x-mdi-delete class="text-red-400 w-7 h-7" />
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-5">
            {{ $equipmentdeducted->links() }}
        </div>
    </div>
</x-layout>

<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        <div class="w-full h-20 flex flex-row items-center justify-end pr-10">
            <a href="{{ route('equipment.add') }}"
                class="border border-[#707070] p-1 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300">
                <x-typ-plus class="w-6 h-6" />
            </a>
        </div>

        <div class="w-full flex items-center gap-9">
            <div class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center">
                <input class="bg-transparent outline-none px-1" type="text" name="query">
                <button>
                    <x-css-search />
                </button>
            </div>

            <button class="transition-all duration-300 bg-[#FD7E14] rounded-lg py-1 px-4 text-white hover:bg-white hover:text-black hover:border hover:border-[#707070]">
                Apply filter
            </button>
        </div>

        <table class="text-center">
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
                @foreach($equipments as $equipment)
                <tr>
                    <td>{{ $equipment->eq_name }}</td>
                    <td>{{ $equipment->stock }}</td>
                    <td>{{ $equipment->eq_da }}</td>
                    <td>{{ $equipment->service_life_end ?? 'N/A' }}</td> <!-- Display service life end, or N/A if not set -->
                    <td class="relative">
                        <a href="{{ route('equipment.deduct', $equipment->eq_id) }}">
                            <x-mdi-minus-box-outline class="text-red-400 w-7 h-7" />
                        </a>
                        {{-- <form action="{{ route('equipment.destroy', $equipment->eq_id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <x-mdi-delete class="text-red-400 w-7 h-7" />
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $equipments->links() }}
    </div>
</x-layout>

<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">

        <div class="w-full h-20 flex flex-row items-center justify-end gap-8 pr-10">

            <a href="{{ route('equipment.add') }}"
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
                <input class="bg-transparent outline-none px-1" type="text" name="query">
                <button>
                    <x-css-search />
                </button>
            </div>

            <button class="transition-all duration-300 rounded-lg py-1 px-4 text-white">
                <div class="flex items-center gap-3 w-fit bg-white border border-[#707070] py-1 px-2 rounded-lg">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                    <input id="datepicker-format" datepicker type="text" class="outline-none w-24"
                        placeholder="Select date">
                </div>

                <button
                    class="transition-all duration-300 bg-[#FD7E14] rounded-lg py-1 px-4 text-white hover:bg-white hover:text-black hover:border hover:border-[#707070]">
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
                    <td>{{ $equipment->service_life_end ?? 'N/A' }}</td>
                    <!-- Display service life end, or N/A if not set -->
                    <td class="relative">
                        <a href="{{ route('equipment.deduct', $equipment->eq_id) }}">
                            <x-mdi-minus-box-outline class="text-red-400 w-7 h-7" />
                        </a>
                        {{-- <form action="{{ route('equipment.destroy', $equipment->eq_id) }}" method="POST"
                        class="inline">
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
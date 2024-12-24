<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        <div class="w-full flex flex-row items-center justify-end pr-10">
            <a href="{{ route('medicine.add') }}" class="border border-[#707070] p-1">
                <x-typ-plus class="w-6 h-6 text-[#FD7E14]" />
            </a>
        </div>

        <!-- Search & Filter Section -->
        <div class="w-full flex items-center gap-9">
            <div class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center">
                <form action="{{ route('medicine.index') }}" method="GET">
                    <input class="bg-transparent outline-none px-1" name="query" type="text"
                        value={{ request('query') }}   placeholder="Search medicine...">
                    <button type="submit">
                        <x-css-search />
                    </button>
                </form>
            </div>

            <select class="bg-transparent outline-none border border-[#707070] rounded-lg bg-white py-1 px-2">
                <option value="volvo" hidden>TYPE OF MEDICINE</option>
                <option value="saab">Lorem</option>
                <option value="opel">Lorem</option>
                <option value="audi">Lorem</option>
            </select>

            <button class="bg-[#FD7E14] rounded-lg py-1 px-4 text-white" type="submit">
                Apply filter
            </button>
        </div>

        <!-- Medicines Table -->
        <table class="text-center w-full mt-6">
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
                        <td>{{ $medicine->m_name }}</td>
                        <td>{{ $medicine->m_da }}</td>
                        <td>{{ $medicine->m_stock }}</td>
                        <td>{{ $medicine->m_date_expired }}</td>
                        <td class="relative">
                            <a href="{{ route('medicine.deductshow', $medicine->m_id) }}">
                                <x-mdi-minus-box-outline class="text-red-400 w-7 h-7 absolute inset-0 m-auto" />
                            </a>
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
</x-layout>

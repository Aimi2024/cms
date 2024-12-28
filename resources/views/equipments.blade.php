<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">

        <div class="w-full h-20 flex flex-row items-center justify-end pr-10">
            <a href="{{ route('medicine.add') }}"
                class="border border-[#707070] p-1 text-[#FD7E14] hover:bg-[#FD7E14] hover:text-white hover:border-none transition duration-300">
                <x-typ-plus class="w-6 h-6" />
            </a>
        </div>

        <div class="w-full flex items-center gap-9">
            <div class="flex flex-row w-fit h-fit border border-[#707070] rounded-lg bg-white py-1 px-2 items-center">
                <input class="bg-transparent outline-none px-1" type="text">
                <button>
                    <x-css-search />
                </button>
            </div>

            <select class="bg-transparent outline-none border border-[#707070] rounded-lg bg-white py-1 px-2">
                <option value="volvo" hidden>TYPE OF EQUIPMENT</option>
                <option value="saab">Lorem</option>
                <option value="opel">Lorem</option>
                <option value="audi">Lorem</option>
            </select>

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
                    <th>Date Added</th>
                    <th>Stock</th>
                    <th>Expiration Date</th>
                    <th>Actions</th> <!-- Optional column for actions like edit or delete -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lorem</td> <!-- Display medicine name -->
                    <td>Lorem</td> <!-- Display date added -->
                    <td>Lorem</td> <!-- Display stock quantity -->
                    <td>Lorem</td> <!-- Display expiration date -->
                    <td class="relative">
                        <a href="">
                            <x-mdi-minus-box-outline class="text-red-400 w-7 h-7 absolute inset-0 m-auto" />
                        </a>

                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</x-layout>
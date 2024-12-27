<x-layout>
    <div class="w-full h-dvh flex flex-col gap-10 p-10 overflow-hidden">
        <h1 class="font-bold text-[clamp(0.9rem,5vw,3.5rem)] text-left">Deduct Medicine</h1>

        <div class="w-full h-dvh flex flex-col items-center">
            <form class="flex gap-40" method="POST" action="{{ route('medicine.deduct', ['id' => $medicine->m_id]) }}">

                @csrf
                @method("POST")

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col">
                        <label for="name" class="font-bold">Product Name</label>
                        <input id="name" name="m_name" type="text" value="{{ $medicine->m_name }}" readonly
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-col">
                        <label for="Arrived" class="font-bold">Product Date Arrived</label>
                        <div id="Arrived"
                            class="flex items-center gap-3 w-fit bg-white border border-[#707070] py-1 px-2 rounded-lg">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                            <input id="datepicker-arrived" value="{{ $medicine->m_da }}" datepicker type="text"
                                class="outline-none px-3 py-1" readonly placeholder="Select date">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col">
                        <label for="Stock" class="font-bold">Product Stock</label>
                        <input id="Stock" name="deduct_quantity" type="text"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-col">
                        <label for="Expired" class="font-bold">Product Date Expired</label>
                        <div id="Expired"
                            class="flex items-center gap-3 w-fit bg-white border border-[#707070] py-1 px-2 rounded-lg">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                            <input id="datepicker-expired" datepicker value="{{ $medicine->m_date_expired }}"
                                type="text" class="outline-none px-3 py-1" readonly placeholder="Select date">
                        </div>
                    </div>
                    <div class="flex flex-row gap-5">
                        <a href="{{route ('medicine.index')}}"
                            class="border border-[#707070] p-2 w-full bg-white text-center rounded-lg flex justify-center items-center hover:bg-[#FD7E14] hover:text-white hover:border-none">No</a>
                        <button
                            class="bg-[#FD7E14] p-2 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black">Deduct
                            Medicine</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
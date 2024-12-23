<x-layout>
    <div class="w-full h-dvh flex flex-col gap-10 p-10 overflow-hidden">
        <h1 class="font-bold text-[clamp(0.9rem,5vw,3.5rem)] text-left">Add Medicine</h1>

        <div class="w-full h-dvh flex flex-col items-center">
            <form class="flex gap-40" method="POST" action="{{ route('medicine.store') }}">
                @csrf
                @method("POST")

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-1">
                        <label for="name" class="font-bold">Product Name</label>
                        <input id="name" name="m_name" type="text"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="arrived" class="font-bold">Product Date Arrived</label>
                        <input id="arrived" name="m_da" type="date"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                </div>

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-1">
                        <label for="stock" class="font-bold">Product Stock</label>
                        <input id="stock" name="m_stock" type="number"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="expired" class="font-bold">Product Date Expired</label>
                        <input id="expired" name="m_date_expired" type="date"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-row gap-5">
                        <a href="{{ route('medicine.index') }}"
                            class="border border-[#707070] text-xs p-2 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none">No</a>
                        <button
                            class="bg-[#FD7E14] text-xs p-2 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black">Add
                            Medicine</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>

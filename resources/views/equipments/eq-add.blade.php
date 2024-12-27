<x-layout>
    <div class="w-full h-dvh flex flex-col p-10 items-center overflow-hidden">

        <div class="flex flex-col px-10 items-start gap-10">
            <h1 class="font-bold text-[clamp(0.9rem,5vw,3rem)] -ml-5">Add Equipments</h1>

            <form class="flex flex-row gap-40" method="POST" action="{{ route('medicine.store') }}">
                <div class="flex flex-col gap-10 w-72">
                    <div class="flex flex-col gap-1">
                        <label for="name" class="font-bold flex-1">Equipment Name</label>
                        <input id="name" name="m_name" type="text"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="arrived" class="font-bold">Equipment Date Arrived</label>
                        <input id="arrived" name="m_da" type="date"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                </div>
                <div class="flex flex-col gap-32 w-72">
                    <div class="flex flex-col gap-1">
                        <label for="stock" class="font-bold">Equipment Stock</label>
                        <input id="stock" name="m_stock" type="number"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-row gap-5">
                        <a href="{{ route('medicine.index') }}"
                            class="border border-[#707070] text-xs p-2 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none">No</a>
                        <button
                            class="bg-[#FD7E14] text-xs p-2 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black">Add
                            Equiment</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-layout>
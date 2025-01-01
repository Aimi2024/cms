<x-layout>
    <div class="w-full h-dvh flex flex-col p-10 items-center overflow-hidden">
        <div class="flex flex-col px-10 items-start gap-10">
            <h1 class="font-bold text-[clamp(0.9rem,5vw,3rem)] -ml-5">Deduct Equipment</h1>

            <form class="flex flex-row gap-40" method="POST" action="{{ route('equipment.deduct.store', $equipment->eq_id) }}">
                @csrf
                <div class="flex flex-col gap-10 w-72">
                    <div class="flex flex-col gap-1">
                        <label for="name" class="font-bold flex-1">Equipment Name</label>
                        <input id="name" name="eq_name" type="text" value="{{ $equipment->eq_name }}" readonly
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="stock" class="font-bold">Stock Quantity</label>
                        <input id="stock" name="stock" type="text" value="{{ $equipment->stock }}" readonly
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="eq_da" class="font-bold">Equipment Date Arrived</label>
                        <input id="eq_da" name="eq_da" type="date" class="outline-none px-3 py-2 border border-[#707070] rounded-lg"
                               value="{{ \Carbon\Carbon::parse($equipment->eq_da)->format('Y-m-d') }}">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="service_life_end" class="font-bold">Service Life End Date</label>
                        <input id="service_life_end" name="service_life_end" type="date" class="outline-none px-3 py-2 border border-[#707070] rounded-lg"
                               value="{{ \Carbon\Carbon::parse($equipment->service_life_end)->format('Y-m-d') }}">
                    </div>
                </div>

                <div class="flex flex-col gap-5 w-72">
                    <div class="flex flex-col gap-1">
                        <label for="deduct_quantity" class="font-bold">Deduct Quantity</label>
                        <input id="deduct_quantity" name="deduct_stock" type="number"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                    <div class="flex flex-row gap-5">
                        <a href="{{ route('equipment.index') }}"
                            class="border border-[#707070] text-xs p-2 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none">Cancel</a>
                        <button
                            class="bg-[#FD7E14] text-xs p-2 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black">Deduct</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>

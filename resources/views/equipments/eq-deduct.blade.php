<x-layout>
    <div class="w-full h-dvh flex flex-col gap-5 md:gap-10 md:p-10 overflow-hidden items-center">

        <h1 class="font-bold text-[clamp(2rem,5vw,3.5rem)] flex items-start w-full px-5">Deduct Equipment</h1>

        <form class="grid grid-cols-1 sm:grid-cols-2 gap-10 w-full lg:w-[50%] px-10 pb-10 md:px-0 overflow-x-auto"
            method="POST" action="{{ route('equipment.deduct.store', $equipment->eq_id) }}">
            @csrf

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
                <input id="eq_da" name="eq_da" type="date"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg"
                    value="{{ \Carbon\Carbon::parse($equipment->eq_da)->format('Y-m-d') }}">
            </div>

            <div class="flex flex-col gap-1">
                <label for="service_life_end" class="font-bold">Service Life End Date</label>
                <input id="service_life_end" name="service_life_end" type="date"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg"
                    value="{{ \Carbon\Carbon::parse($equipment->service_life_end)->format('Y-m-d') }}">
            </div>

            <div class="flex flex-col gap-1">
                <label for="deduct_quantity" class="font-bold">Deduct Quantity</label>
                <input id="deduct_quantity" name="deduct_stock" type="number"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
            </div>
            <div class="flex flex-col gap-1">
                <label for="deduct_reason" class="font-bold">Reason</label>
                <input id="deduct_reason" name="deduct_reason" type="text"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
            </div>

            <div class="flex flex-row gap-5 mt-7 sm:col-start-2">
                <a href="{{ route('equipment.index') }}"
                    class="border border-[#707070] h-10 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none flex items-center justify-center">Cancel</a>
                <button
                    class="bg-[#FD7E14] h-10 px-1 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black flex items-center justify-center">Deduct</button>
            </div>

        </form>

    </div>
</x-layout>

<x-layout>
    <div class="w-full h-dvh flex flex-col gap-5 md:gap-10 md:p-10 overflow-hidden items-center">

        <h1 class="font-bold text-[clamp(2rem,5vw,3.5rem)] flex items-start w-full px-5">Add Equipment</h1>

        <form class="grid grid-cols-1 sm:grid-cols-2 gap-10 w-full lg:w-[50%] px-10 pb-10 md:px-0 overflow-x-auto"
            method="POST" action="{{ route('equipment.store') }}">
            @csrf

            <!-- Display All Errors -->
            @if ($errors->any())
                <div class="col-span-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg w-full">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Equipment Name -->
            <div class="flex flex-col gap-1">
                <label for="name" class="font-bold">Equipment Name</label>
                <input id="name" name="eq_name" type="text"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg @error('eq_name') border-red-500 @enderror"
                    value="{{ old('eq_name') }}">
                @error('eq_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Equipment Date Arrived -->
            <div class="flex flex-col gap-1">
                <label for="arrived" class="font-bold">Equipment Date Arrived</label>
                <input id="arrived" name="eq_da" type="date"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg @error('eq_da') border-red-500 @enderror"
                    value="{{ old('eq_da') }}">
                @error('eq_da')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Equipment Stock -->
            <div class="flex flex-col gap-1">
                <label for="stock" class="font-bold">Equipment Stock</label>
                <input id="stock" name="stock" type="number"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg @error('stock') border-red-500 @enderror"
                    value="{{ old('stock') }}">
                @error('stock')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Service Life End Date -->
            <div class="flex flex-col gap-1">
                <label for="service_life_end" class="font-bold">Service Life End Date</label>
                <input id="service_life_end" name="service_life_end" type="date"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg @error('service_life_end') border-red-500 @enderror"
                    value="{{ old('service_life_end') }}">
                @error('service_life_end')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-row gap-5 mt-5 sm:col-start-2">
                <a href="{{ route('equipment.index') }}"
                    class="border border-[#707070] h-10 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none flex items-center justify-center">No</a>
                <button
                    class="bg-[#FD7E14] h-10 px-1 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black flex items-center justify-center">Add
                    Equipment</button>
            </div>

        </form>

    </div>
</x-layout>

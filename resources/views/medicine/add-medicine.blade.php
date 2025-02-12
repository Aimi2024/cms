<x-layout>
    <div class="w-full h-dvh flex flex-col gap-5 md:gap-10 md:p-10 overflow-hidden items-center">

        <h1 class="font-bold text-[clamp(2rem,5vw,3.5rem)] flex items-start w-full px-5">Add Medicine</h1>

        <form class="grid grid-cols-1 sm:grid-cols-2 gap-10 w-full lg:w-[50%] px-10 pb-10 md:px-0 overflow-x-auto"
            method="POST" action="{{ route('medicine.store') }}">
            @csrf
            @method("POST")

            <div class="flex flex-col gap-1">
                <label for="name" class="font-bold">Product Name</label>
                <input id="name" name="m_name" type="text"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg @error('m_name') border-red-500 @enderror"
                    value="{{ old('m_name') }}">
                @error('m_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="arrived" class="font-bold">Product Date Arrived</label>
                <input id="arrived" name="m_da" type="date"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg @error('m_da') border-red-500 @enderror"
                    value="{{ old('m_da') }}">
                @error('m_da')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="stock" class="font-bold">Product Stock</label>
                <input id="stock" name="m_stock" type="number"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg @error('m_stock') border-red-500 @enderror"
                    value="{{ old('m_stock') }}">
                @error('m_stock')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="expired" class="font-bold">Product Date Expired</label>
                <input id="expired" name="m_date_expired" type="date"
                    class="outline-none px-3 py-2 border border-[#707070] rounded-lg @error('m_date_expired') border-red-500 @enderror"
                    value="{{ old('m_date_expired') }}">
                @error('m_date_expired')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-row gap-5 mt-5 sm:col-start-2">
                <a href="{{ route('medicine.index') }}"
                    class="border border-[#707070] h-10 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none flex items-center justify-center">No</a>
                <button
                    class="bg-[#FD7E14] h-10 px-1 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black flex items-center justify-center">Add
                    Medicine</button>
            </div>

        </form>

    </div>
</x-layout>

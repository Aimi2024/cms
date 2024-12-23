<x-layout>

    <div class="w-full h-dvh flex flex-col">

        <div class="w-full h-dvh bg-green-300 flex flex-col items-center">
            <h1 class="">Add Medicine</h1>
            <form class="grid grid-cols-2 gap-10" method="POST" action ="{{ route('medicine.store') }}">
                @csrf
                @method("POST")
                <div class="flex flex-col">
                    <label for="name">Product Name</label>
                    <input id="name" name="m_name" type="text">
                </div>
                <div class="flex flex-col">
                    <label for="Arrived">Product Date Arrived</label>
                    <input id="Arrived"  name="m_da" type="date">
                </div>
                <div class="flex flex-col">
                    <label for="Stock">Product Stock</label>
                    <input id="Stock" name="m_stock" type="text">
                </div>
                <div class="flex flex-col">
                    <label for="Expired">Product Date Expired</label>
                    <input id="Expired" name="m_date_expired" type="date">
                </div>

                <button class="border border-[#707070] bg-white">No</button>
                <button class="bg-[#FD7E14] text-white">Add Medicine</button>
            </form>
        </div>
    </div>


</x-layout>

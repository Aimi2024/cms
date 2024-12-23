<x-layout>
    <div class="w-full h-dvh flex flex-col gap-10 p-10 overflow-hidden">
        <h1 class="font-bold text-[clamp(0.9rem,5vw,3.5rem)] text-left">Create Account</h1>

        <div class="w-full h-dvh flex flex-col items-center">
            <form class="flex gap-40" method="POST" action="{{ route('medicine.store') }}">
                @csrf
                @method("POST")

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-1">
                        <label for="name" class="font-bold">Account Name</label>
                        <input id="name" name="m_name" type="text"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="Email" class="font-bold">Email</label>
                        <input id="Email" name="m_da" type="email"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>
                </div>

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-1">
                        <label for="Password" class="font-bold">Account Password</label>
                        <input id="Password" name="m_stock" type="text"
                            class="outline-none px-3 py-2 border border-[#707070] rounded-lg">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="Type" class="font-bold">Account Type</label>
                        <select id="Type"
                            class="bg-transparent px-3 py-2 outline-none border border-[#707070] rounded-lg bg-white">
                            <option value="volvo" hidden>Account Type</option>
                            <option value="saab">Admin</option>
                            <option value="opel">User</option>
                        </select>
                    </div>

                    <div class="flex flex-row gap-5">
                        <a href="{{ route('medicine.index') }}"
                            class="border border-[#707070] p-2 w-full bg-white text-center rounded-lg hover:bg-[#FD7E14] hover:text-white hover:border-none flex items-center justify-center">No</a>
                        <button
                            class="bg-[#FD7E14] text-xs p-2 w-full text-white rounded-lg hover:border hover:border-[#707070] hover:bg-white hover:text-black flex items-center justify-center">Create
                            Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
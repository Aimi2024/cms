<x-layout>
    <div class="w-full h-dvh flex flex-col px-10 py-8 gap-5">
        <div class="w-full flex flex-row items-center justify-end pr-10 h-5">
            <a href=""
                class="hover:border hover:border-[#707070] hover:bg-white bg-[#FD7E14] px-3 py-2 flex items-start gap-3 rounded-3xl hover:text-[#FD7E14] text-white">
                <x-typ-plus class="w-6 h-6 " />
                ADD NEW
            </a>
        </div>
        <div class="w-full flex items-center gap-9">
            <select
                class="bg-transparent outline-none border border-[#707070] rounded-lg bg-white px-2 py-1 text-center">
                <option value="volvo" hidden>10</option>
                <option value="saab">1</option>
                <option value="opel">2</option>
                <option value="audi">3</option>
            </select>

            <div class="flex flex-row w-fit h-fit border border-[#707070] rounded-3xl bg-white px-2 items-center">
                <input class="bg-transparent outline-none px-2" type="text">
                <button class="border-l-2 p-1">
                    <x-css-search />
                </button>
            </div>

        </div>

        <table class="text-center">
            <thead>
                <tr>
                    <th>Lorem</th>
                    <th>Lorem</th>
                    <th>Lorem</th>
                    <th>Loreme</th>
                    <th>Lorem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
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
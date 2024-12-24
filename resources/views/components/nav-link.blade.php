@props(['active' => false])

<a class="{{ $active ? 'bg-[#FD7E14] text-white' : 'bg-white hover:bg-[#FD7E14] hover:text-white' }} flex items-center w-full px-3 py-1 rounded-lg h-fit gap-5 text-center overflow-hidden whitespace-nowrap"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
    <x-hugeicons-less-than
        class="{{ $active ? 'rotate-180 transition-transform duration-300 shirnk' : '' }} w-5 h-5 " />
    {{ $slot }}
</a>
@props(['active' => false])




<a class="{{ $active ? 'bg-[#FD7E14] text-white' : 'bg-white hover:bg-[#FD7E14] hover:text-white' }} flex items-center w-full px-3 py-1 rounded-lg h-fit gap-5 text-center"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
     {{ $slot }}
</a>


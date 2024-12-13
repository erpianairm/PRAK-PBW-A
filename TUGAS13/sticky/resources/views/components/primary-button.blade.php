<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-stone-800 border border-transparent rounded-md font-medium tracking-tight text-sm text-white hover:bg-stone-700 focus:bg-stone-700 active:bg-stone-900 focus:outline-none focus:ring-2 focus:ring-white-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

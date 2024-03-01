<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  focus:outline-none focus:border-gray-900 focus:ring  disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>

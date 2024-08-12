<a wire:navigate
  {{ $attributes->merge(['class' => 'block w-full px-1 py-2 text-left text-sm leading-5 text-slate-400 hover:text-white hover:font-semibold hover:bg-secondary hover:border-l-4 hover:border-primary focus:bg-yellow-50 focus:text-primary focus:font-semibold focus:border-l-4 focus:border-primary transition duration-150 ease-in-out rounded-lg']) }}>{{ $slot }}</a>

<div>
    @if($showItemModel)
        <x-jet-dialog-modal wire:model="showItemModel" maxWidth='2xl'>
        <x-slot name="title">
            {{ __('Informations du sondage') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Nom du sondage') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->name }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-4">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Question du sondage') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->questions()->first()->content }}</div>
                    </div>
                </div>
                @php
    $question = $item->questions()->first();
    $options = $question->options;
    $answers = $question->answers;
    $uniqueEntriesCount = $question->answers()
    ->join('entries', 'answers.entry_id', '=', 'entries.id')
    ->distinct('entries.ip_address')
    ->count('entries.ip_address');
    @endphp

@foreach ($options as $option)
    <div class="col-span-1 md:col-span-2 lg:col-span-2">
        <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Nombre de vote') }}</div>
            <div class="flex justify-between items-center">
                <div class="text-sm font-bold z-10">{{ $option }}</div>
                <div class="text-sm font-bold">
                    <span
                    class="inline-flex items-center gap-1 rounded-full  px-2 py-1 text-md font-semibold"
                    style="color:#4f46e5"
                  >
                    <span class="h-1.5 w-1.5 rounded-full" style="background-color: #4f46e5"></span>
                    {{ $answers->where('value', $option)->count() }}
                  </span>
                  
                    </div>
            </div>
        </div>
    </div>
@endforeach

{{-- @foreach ($options as $option)
    <div class="col-span-1 md:col-span-2 lg:col-span-2">
        <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Nombre de vote unique') }}</div>
            <div class="text-sm font-bold z-10">{{ $option }}</div>
            <div class="text-sm">{{ $uniqueEntriesCount }}</div>
        
        <div class="flex justify-between items-center">
            <div class="text-sm font-bold z-10">{{ $option }}</div>
            <div class="text-sm font-bold">
                <span
                class="inline-flex items-center gap-1 rounded-full  px-2 py-1 text-md font-semibold"
                style="color:#4f46e5"
              >
                <span class="h-1.5 w-1.5 rounded-full" style="background-color: #4f46e5"></span>
                {{ $uniqueEntriesCount }}
              </span>
              
                </div>
        </div>
    </div>
    </div>
@endforeach --}}

            <div>
                
            </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeItemModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

        </x-slot>

    </x-jet-dialog-modal>
    @endif

</div>

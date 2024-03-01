<div>
    @if($showItemModel)
        <x-jet-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{ __('Informations de la catégorie ') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">

                {{-- <div class="col-span-2 md:col-span-4 lg:col-span-1 lg:row-span-3 order-last lg:order-none">
                    <div class="flex flex-row items-center justify-center">
                        <div class="relative mt-4">
                            <div class="w-20 h-20 bg-gray-200  rounded-full">
                                @if(!empty($item->avatar))
                                    <img src={{ asset('storage/'.$item->avatar) }}
                                        class="object-cover w-20 h-20 rounded-full">
                                @endif
                            </div>
                        </div>
                    </div>
                </div> --}}


                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('name') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->name }}</div>
                    </div>
                </div>


                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('order') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->order }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('slug') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->slug }}</div>
                    </div>
                </div>


                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('crée en') }}</div>
                        <div class=" text-sm font-bold z-10 text-indigo-600">{{ date('D jS M Y',strtotime($item->created_at)) }} </div>
                    </div>
                </div>


                @if($item->created_at != $item->updated_at)
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('updated_at') }}</div>
                            <div class=" text-sm font-bold z-10 text-indigo-600">{{ date('D jS M Y',strtotime($item->updated_at)) }} </div>
                        </div>
                    </div>
                @endif

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

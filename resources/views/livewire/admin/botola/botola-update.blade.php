<div>
    <x-jet-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('Créer un nouveau match') }} 
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-6">
                        <div class="flex flex-row items-center justify-center">
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <input type="file" class="hidden"
                                        wire:model="logo"
                                        x-ref="logo"
                                        x-on:change="
                                                photoName = $refs.logo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.logo.files[0]);
                                        " />
                            <div class="w-24 h-24 bg-gray-200 rounded-full" x-show="! photoPreview">
                                @if(!empty($logo))
                                <img src="{{ $logo }}" alt="{{ $logo }}" class="h-full w-full object-cover">
                                @elseif(!empty($logo_path))
                                <img src="{{ asset($logo_path)  }}"
                                     class="object-cover w-24 h-24 rounded-full">
                                @endif
                            </div>
                            <div class="w-24 h-24 bg-gray-200 rounded-full" x-show="photoPreview" style="display: none;">
                                <span class="block w-full h-full bg-cover bg-no-repeat bg-center rounded-full"
                                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button class="-mt-10 mr-2 p-3 rounded-full bg-indigo-500" type="button" x-on:click.prevent="$refs.logo.click()">
                                <svg wire:target="logo" wire:loading.class="animate-bounce" class="w-4 h-4 text-white " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                            </button>
            
                            <x-jet-input-error for="logo" class="mt-2" />
                        </div>
                        </div>
                    </div>



                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="name" value="{{ __('Name') }}"/>
                        <x-jet-input wire:model.defer="name" type="text" class="mt-1 block w-full"/>
                        <x-jet-input-error for="name" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="win" value="{{ __('Win') }}"/>
                        <x-jet-input wire:model.defer="win"
                                    class="block mt-1 w-full" type="text"
                                    />
                        <x-jet-input-error for="win" class="mt-2"/>
                                
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="Lose" value="{{ __('Lose') }}"/>
                        <x-jet-input wire:model.defer="lose"
                                    class="block mt-1 w-full" type="text"
                                    />
                        <x-jet-input-error for="Lose" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="Draw" value="{{ __('Draw') }}"/>
                        <x-jet-input wire:model.defer="draw"
                                    class="block mt-1 w-full" type="text"
                                    />
                        <x-jet-input-error for="Draw" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="Points" value="{{ __('Points') }}"/>
                        <x-jet-input wire:model.defer="points"
                                    class="block mt-1 w-full" type="text"
                                    />
                        <x-jet-input-error for="Points" class="mt-2"/>
                    </div>

                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ml-3 bg-gray-600 hover:bg-gray-800">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </form>

    </x-jet-dialog-modal>
</div>
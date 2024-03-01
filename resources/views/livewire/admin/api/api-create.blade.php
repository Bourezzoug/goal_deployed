<div>
    <x-jet-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('Créer un nouveau match') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">


                    {{-- <div class="col-span-1 md:col-span-2 lg:col-span-3"> --}}
                        {{-- <div class="flex flex-row items-center justify-center">
                            <div class="relative mt-4">
                                <div class="w-24 h-24 bg-gray-200 rounded-full">
                                    @if(!empty($equipe1_logo))
                                        <img src="{{ $equipe1_logo->temporaryUrl() }}" 
                                            class="object-cover w-24 h-24 rounded-full">
                                    @endif
                                </div>
                                <span class="absolute bottom-0 left-0 w-8 h-8 p-2 rounded-full bg-indigo-600 shadow-md">
                                <label>
                                    <svg wire:target="equipe1_logo" wire:loading.class="animate-bounce" class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                    </svg>
                                    <input wire:model="equipe1_logo" type="file" accept="image/png, image/jpeg,image/gif" class="hidden opacity-0">
                                </label>
                            </span>
                                <x-jet-input-error for="equipe1_logo" class="mt-2"/>
                            </div>
                        </div> --}}
                    {{-- </div> --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <div class="flex flex-row items-center justify-center">
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden"
                                        wire:model="equipe1_logo"
                                        x-ref="equipe1_logo"
                                        x-on:change="
                                                photoName = $refs.equipe1_logo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.equipe1_logo.files[0]);
                                        " />
                            <div class="w-24 h-24 bg-gray-200 rounded-full" x-show="! photoPreview">
                                @if(!empty($equipe1_logo))
                                <img src="{{ $equipe1_logo }}" alt="{{ $equipe1_logo }}" class="h-full w-full object-cover">
                            @endif
                            </div>
                            <div class="w-24 h-24 bg-gray-200 rounded-full" x-show="photoPreview" style="display: none;">
                                <span class="block w-full h-full bg-cover bg-no-repeat bg-center rounded-full"
                                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button class="-mt-10 mr-2 p-3 rounded-full bg-indigo-500" type="button" x-on:click.prevent="$refs.equipe1_logo.click()">
                                <svg wire:target="equipe1_logo" wire:loading.class="animate-bounce" class="w-4 h-4 text-white " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                            </button>
            
                            <x-jet-input-error for="equipe1_logo" class="mt-2" />
                        </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <div class="flex flex-row items-center justify-center">
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden"
                                        wire:model="equipe2_logo"
                                        x-ref="equipe2_logo"
                                        x-on:change="
                                                photoName = $refs.equipe2_logo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.equipe2_logo.files[0]);
                                        " />
                            <div class="w-24 h-24 bg-gray-200 rounded-full" x-show="! photoPreview">
                                @if(!empty($equipe2_logo))
                                <img src="{{ $equipe2_logo }}" alt="{{ $equipe2_logo }}" class="h-full w-full object-cover">
                            @endif
                            </div>
                            <div class="w-24 h-24 bg-gray-200 rounded-full" x-show="photoPreview" style="display: none;">
                                <span class="block w-full h-full bg-cover bg-no-repeat bg-center rounded-full"
                                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button class="-mt-10 mr-2 p-3 rounded-full bg-indigo-500" type="button" x-on:click.prevent="$refs.equipe2_logo.click()">
                                <svg wire:target="equipe2_logo" wire:loading.class="animate-bounce" class="w-4 h-4 text-white " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                            </button>
            
                            <x-jet-input-error for="equipe2_logo" class="mt-2" />
                        </div>
                        </div>
                    </div>


                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="equipe1_name" value="{{ __('Équipe 1') }}"/>
                        <x-jet-input wire:model.defer="equipe1_name" type="text" class="mt-1 block w-full"/>
                        <x-jet-input-error for="equipe1_name" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="equipe2_name" value="{{ __('Équipe 2') }}"/>
                        <x-jet-input wire:model.defer="equipe2_name"
                                    class="block mt-1 w-full" type="text"
                                    />
                        <x-jet-input-error for="equipe2_name" class="mt-2"/>
                                
                    </div>
                    
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="date_match" value="{{ __('Date du match') }}"/>
                        <x-jet-input wire:model.defer="date_match"
                                    class="block mt-1 w-full" type="date"
                                    />
                        <x-jet-input-error for="date_match" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="heure" value="{{ __('Heure du match') }}"/>
                        <x-jet-input wire:model.defer="heure"
                                    class="block mt-1 w-full" type="time"
                                    />
                        <x-jet-input-error for="heure" class="mt-2"/>
                    </div>

                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button type="submit" wire:click="create" wire:loading.attr="disabled" class="ml-3 bg-gray-600 hover:bg-gray-800">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </form>

    </x-jet-dialog-modal>
</div>
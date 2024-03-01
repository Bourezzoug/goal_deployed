<div>
    <x-jet-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('Modifier les informations du bannière') }}
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" x-data="{ open: false }">

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="titre" value="{{ __('Nom de la bannière') }}"/>
                        <x-jet-input wire:model.defer="titre" id="titre" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="titre" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label class="text-xs" for="position" value="{{ __('Zone') }}"/>
                         <x-select wire:model="position" wire:change="updateDateRange" wire:key="positionCreate" class="mt-1">
                            <option value="" readonly="true" hidden="true"
                                    selected>{{ __('Selectionner une position') }}</option>
                            {{-- <option value="Acceuil:top">Acceuil:top</option> --}}
                            <option value="Popup">Popup</option>
                            <option value="Habillage:top">Habillage:top</option>
                            <option value="Habillage:right">Habillage:right</option>
                            <option value="Habillage:left">Habillage:left</option>
                            <option value="Alert">Alert</option>
                            <option value="Acceuil:Tennis-right">Acceuil:Tennis-right</option>


                            <option value="Acceuil:Boxe-right">Acceuil:Boxe-right</option>

                            <option value="Position_1">Position:1</option>
                            <option value="Position_2">Position:2</option>
                            <option value="Position_3">Position:3</option>
                            <option value="Position_4">Position:4</option>
                            <option value="Position_5">Position:5</option>
                            <option value="Position_6">Position:6</option>
                            <option value="Position_7">Position:7</option>
                        </x-select>
                        <x-jet-input-error for="position" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label class="text-xs" for="campagne" value="{{ __('Campagnes') }}"/>
                        <x-select wire:model="campagne_id" id="campagne" wire:key="campagneCreate" class="mt-1" @change.once="open = ! open">
                            <option value="" readonly="true" hidden="true" selected>{{ __('Selectionner une campagne') }}</option>
                            @forelse($campagne as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                            @endforelse
                        </x-select>
                        <x-jet-input-error for="campagne" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <div>
                            <x-jet-label class="text-xs" for="plannification" value="{{ __('Plannification') }}"/>
                            <input type="text" id="plannification" name="plannification" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" x-data
                            x-init="() => {
                                const plannification = {{ json_encode(explode(',', $plannification)) }};
                                flatpickr($refs.plannification, {
                                    mode: 'multiple',
                                    minDate: '{{ $minDate }}',
                                    maxDate: '{{ $maxDate }}',
                                    disable: {{ json_encode($existingDates) }}, // Use existing dates to disable them in the flatpicker
                                    defaultDate: plannification,
                                    dateFormat: 'Y-m-d',
                                    onClose: function(selectedDates, dateStr, instance) {
                                        const formattedDates = selectedDates.map(date => {
                                          const year = date.getFullYear();
                                          const month = String(date.getMonth() + 1).padStart(2, '0');
                                          const day = String(date.getDate()).padStart(2, '0');
                                          return `${year}-${month}-${day}`;
                                        });
                                        @this.set('plannification', formattedDates.join(','));
                                      }
                                });
                            }"
                            x-ref="plannification"
                            name="plannification"
                            autocomplete="off"
                            readonly
                        >
                        
                        </div>
                        <x-jet-input-error for="plannification" class="mt-2"/>
                    </div>



                    <div class="col-span-1 md:col-span-2 lg:col-span-6">
                        <div class="flex flex-row items-center justify-center">
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden"
                                        wire:model="image"
                                        x-ref="image"
                                        x-on:change="
                                                photoName = $refs.image.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.image.files[0]);
                                        " />
                            <div class="w-full xl:w-97 h-56 bg-gray-200" x-show="! photoPreview">
                                @if(!empty($image))

                                <img src="{{ $image->temporaryUrl() }}"
                                     class="object-cover w-full h-fulll">

                            @elseif(!empty($image_path))
                                <img src="{{ asset($image_path)  }}"
                                     class="object-cover w-full h-full">
                            @endif
                            </div>
                            <div class="w-full xl:w-97 h-56 bg-gray-200" x-show="photoPreview" style="display: none;">
                                <span class="block w-full h-full bg-cover bg-no-repeat bg-center"
                                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button class="-mt-10 mr-2 p-3 rounded-full bg-indigo-500" type="button" x-on:click.prevent="$refs.image.click()">
                                <svg wire:target="image" wire:loading.class="animate-bounce" class="w-4 h-4 text-white " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                            </button>
            
                            <x-jet-input-error for="image" class="mt-2" />
                        </div>
                        </div>
                    </div>



                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="lien" value="{{ __('Lien') }}"/>
                        <x-jet-input wire:model.defer="lien" id="lien" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="lien" class="mt-2"/>
                    </div>


                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="">
                    {{ __('update') }}
                </x-jet-button>
            </x-slot>
        </form>

    </x-jet-dialog-modal>
</div>

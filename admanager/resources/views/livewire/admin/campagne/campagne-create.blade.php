<div>
    <x-jet-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('Créer une nouvelle campagne') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="libelle" value="{{ __('Nom de la campagne') }}"/>
                        <x-jet-input wire:model.defer="libelle" id="libelle" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="libelle" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label class="text-xs" for="clientId" value="{{ __('Clients') }}"/>
                        <x-select wire:model="clientId" wire:key="clientCreate" class="mt-1">
                            <option value="" readonly="true" hidden="true"
                                    selected>{{ __('Selectionner un client') }}</option>
                            @forelse($clients as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                            @endforelse
                        </x-select>
                        <x-jet-input-error for="clientId" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <!-- Show date picker component here -->
                        <div class="py-5">
                        <x-jet-label class="text-xs" for="date_debut" value="{{ __('Date début') }}"/>
                        <x-jet-input wire:model.defer="date_debut" id="start_date" type="date" class="mt-1 block w-full" :min="now()->format('Y-m-d')"/>
                        </div>
                        <x-jet-input-error for="date_debut" class="mt-2"/>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var startDateInput = document.getElementById('start_date');
                            var endDateInput = document.getElementById('end_date');
                    
                            startDateInput.addEventListener('change', function() {
                                var startDateValue = startDateInput.value;
                                endDateInput.setAttribute('min', startDateValue);
                                endDateInput.removeAttribute('disabled')
                            });
                        });
                    </script>                    
                        
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <!-- Show date picker component here -->
                        <div class="py-5">
                        <x-jet-label class="text-xs" for="date_fin" value="{{ __('Date fin') }}"/>
                        <x-jet-input wire:model.defer="date_fin" id="end_date" type="date" class="mt-1 block w-full"  disabled/>
                        </div>
                        <x-jet-input-error for="date_fin" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <x-jet-checkbox wire:model.defer="status" id="status" type="text" class="sr-only peer" />
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                        </label>
                        <x-jet-input-error for="status" class="mt-2"/>
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
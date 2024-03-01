<div>
    <x-jet-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('Ajouter un nouveau inscrit') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-1 md:col-span-2 lg:col-span-6">
                        <x-jet-label for="nom_complet" value="{{ __('Nom Complet') }}"/>
                        <x-jet-input wire:model.defer="nom_complet" id="nom_complet" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="nom_complet" class="mt-2"/>
                    </div>


                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input wire:model.defer="email" id="email" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="email" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <x-jet-label for="telephone" value="{{ __('Telephone') }}"/>
                        <x-jet-input wire:model.defer="telephone" id="telephone" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="telephone" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <x-jet-label for="ville" value="{{ __('Ville') }}"/>
                        <x-jet-input wire:model.defer="ville" id="ville" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="ville" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <x-jet-label for="civilite" value="{{ __('Civilité') }}"/>
                        <x-jet-input wire:model.defer="civilite" id="civilite" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="civilite" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <x-jet-label class="text-xs" for="select" value="{{ __('Age') }}"/>
                        <x-select wire:model="age" class="mt-2">
                            <option value="18-25" selected>{{ __('18 - 25') }}</option>
                            <option value="25-35">{{ __('25 - 35') }}</option>
                            <option value="35-45">{{ __('35 - 45') }}</option>
                            <option value="45+">{{ __('45+') }}</option>
                        </x-select>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <x-jet-label class="text-xs" for="select" value="{{ __('Fonction') }}"/>
                        <x-select wire:model="fonction" class="mt-2">
                            <option value="cadre_supérieur">{{ __('Cadre Supérieur') }}</option>
                            <option value="cadre">{{ __('Cadre') }}</option>
                            <option value="direction_general">{{ __('Direction général') }}</option>
                            <option value="profession_libérales">{{ __('Profession Libérales') }}</option>
                            <option value="assistante_de_diraction">{{ __('Assistante de diraction') }}</option>
                            <option value="etudiant(e)">{{ __('Étudiant(e)') }}</option>
                            <option value="retraite">{{ __('Retraité') }}</option>
                            <option value="employé(e)_de_bureau">{{ __('Employé(e) de bureau') }}</option>
                            <option value="femme_au_foyer">{{ __('Femme au foyer') }}</option>
                            <option value="autre">{{ __('Autre') }}</option>
                        </x-select>
                    </div>
                
                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <x-jet-checkbox wire:model.defer="newsgoal" id="newsgoal" type="text" class="sr-only peer"  checked/>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 ">News goal</span>
                        </label>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <x-jet-checkbox wire:model.defer="newspartenaire" id="newspartenaire" type="text" class="sr-only peer" checked/>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 ">News Partenaire</span>
                        </label>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <x-jet-checkbox wire:model.defer="condition" id="condition" type="text" class="sr-only peer" checked/>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 ">Conditions</span>
                        </label>
                    </div>

                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ml-3 bg-gray-600 hover:bg-gray-800">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </form>

    </x-jet-dialog-modal>
</div>
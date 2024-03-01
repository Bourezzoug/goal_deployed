<div>
    <x-jet-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('Créer un nouveau client') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-jet-label for="nom" value="{{ __('Nom entreprise') }}"/>
                        <x-jet-input wire:model.defer="nom" id="nom" type="text" class="mt-1 block w-full" />
                        <x-jet-input-error for="nom" class="mt-2"/>
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
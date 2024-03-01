<div>
    <x-jet-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('Créer un sondage') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="col-span-1 md:col-span-2 lg:col-span-4">
                    <x-jet-label for="name" value="{{ __('Nom du sondage') }}"/>
                    <x-jet-input wire:model.defer="name" id="name" type="text" class="mt-1 block w-full" />
                    <x-jet-input-error for="name" class="mt-2"/>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-5">
                    <x-jet-label for="content" value="{{ __('Question du sondage') }}"/>
                    <x-jet-input wire:model.defer="content" id="content" type="text" class="mt-1 block w-full" />
                    <x-jet-input-error for="content" class="mt-2"/>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-5">
                    <x-jet-label for="options" value="{{ __('Options du sondage') }}"/>
                    <x-jet-input wire:model.defer="options" id="options" type="text" class="mt-1 block w-full" placeholder="Veuillez séparer vos options avec des virgules" />
                    <x-jet-input-error for="options" class="mt-2"/>
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
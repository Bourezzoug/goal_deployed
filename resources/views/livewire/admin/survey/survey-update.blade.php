<div>
    <x-jet-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('Modifier les informations du sondage') }}
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">
                <div class="col-span-1 md:col-span-2 lg:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}"/>
                    <x-jet-input wire:model.defer="name" type="text" class="mt-1 block w-full" />
                    <x-jet-input-error for="name" class="mt-2"/>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-5">
                    <x-jet-label for="content" value="{{ __('Question du sondage') }}"/>
                    <x-jet-input wire:model.defer="content" type="text" class="mt-1 block w-full" />
                    <x-jet-input-error for="content" class="mt-2"/>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-5">
                    <x-jet-label for="options" value="{{ __('Options du sondage') }}"/>
                    <x-jet-input wire:model.defer="options" type="text" class="mt-1 block w-full" />
                    <x-jet-input-error for="options" class="mt-2"/>
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

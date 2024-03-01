<div>
    <x-jet-confirmation-modal wire:model="showDeleteModel">
        <x-slot name="title">
            {{ __('Supprimer un role') }} 
        </x-slot>

        <x-slot name="content">
            {{ __('Voulez-vous supprimer ce role') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeDeleteModel" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

</div>
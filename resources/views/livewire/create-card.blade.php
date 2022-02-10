<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nueva carta
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nueva carta
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre de la carta"/>
                <x-jet-input type="text" class="w-full" wire:model="carta"/>
                {{-- {{$carta}} --}}
                {{-- @error('carta')
                    <span>
                        {{$message}}
                    </span>
                @enderror --}}

                <x-jet-input-error for="carta"/>

            </div>

            {{-- <div class="mb-4">
                <x-jet-label value="Salio"/>
                <x-jet-input wire:model.defer="salio" type="text" class="w-full" value="0"/>
                {{-- {{$salio}}
            </div> --}}

        </x-slot>


        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Crear carta
            </x-jet-danger-button>

            {{-- <span wire:loading wire:target="save">Cargando...</span> --}}
        </x-slot>

    </x-jet-dialog-modal>
</div>

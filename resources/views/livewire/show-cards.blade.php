<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>

            <div class="px-5 py-4 flex items-center">
                <x-jet-input class="mr-4" placeholder="Escriba una carta..." type="text" wire:model="search" />

                {{-- @livewire('create-card') --}}
            </div>



            @if ($cards->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID

                                @if ($sort == 'id')

                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>

                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('carta')">
                                Carta

                                @if ($sort == 'carta')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>

                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif


                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('salio')">
                                Salio
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($cards as $card)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $card->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $card->carta }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        <input wire:model="selectedSalio" type="checkbox" value="{{ $card->id }}">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            @else
                <div class="px-6 py-4">
                    No existe alguna carta con ese nombre
                </div>
            @endif

        </x-table>

        <table>
            <tbody>
                <tr>
                    @while ($i < $numeroDeCartas)
                <tr>
                    <td>
                        <b>Tabla {{ $i + 1 }}: </b>
                        {{ $this->llenarTabla($tablas[$i]) }}
                        <strong style="color: green;">{{ $this->ganador($i) }}</strong>
                    </td>

                    @php
                        $i++;
                    @endphp

                </tr>
                @endwhile
            </tbody>
        </table>
    </div>
</div>

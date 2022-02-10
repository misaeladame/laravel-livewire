<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- {{$posts}} --}}
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

            <div class="px-6 py-4 flex items-center">
                {{-- <input type="text" wire:model="search"> --}}
                <x-jet-input class="mr-4" placeholder="Escriba una carta..." type="text" wire:model="search" />

                @livewire('create-card')
            </div>



            @if ($cards->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID

                                {{-- sort --}}
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

                                {{-- sort --}}
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('salio')">
                                Salio

                                {{-- sort --}}
                                @if ($sort == 'salio')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>

                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
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

                                        {{-- {{ $card->salio }} --}}
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td> --}}
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>



            @else
                <div class="px-6 py-4">
                    No existe alguna carta con ese nombre
                </div>
            @endif

        </x-table>

        {{-- {{var_export($selectedSalio)}} --}}

        <table>
            <tbody>
                <tr>
                    <td>
                        Tabla 1:
                        {{-- @foreach ($selectedSalio as $salio)
                            {{$salio}}
                            @php

                                if (in_array($salio, $tabla1)) {
                                    echo $salio . ",";
                                }
                            @endphp
                        @endforeach --}}

                        {{ $this->llenarTabla($tabla1) }}

                    </td>
                </tr>

                <tr>
                    <td>
                        Tabla 2:
                        @foreach ($selectedSalio as $salio)
                            {{-- {{$salio}} --}}
                            @php

                                if (in_array($salio, $tabla2)) {
                                    echo $salio . ",";
                                }
                            @endphp
                        @endforeach

                        {{-- {{ llenarTabla($tabla1) }} --}}

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div>
    <div class=" d-flex justify-content-center align-items-center flex-column w-50 ">
        <input type="file" wire:model="image" accept="image/jpg,image/png,image/jpeg" />
        <span wire:loading wire:target="image">loading....</span>
    </div>
    <div class="d-flex  gap-4  flex-wrap  ">
        <table class="table mx-auto p-5">
            <thead>
                <tr>
                    <th>{{ $model->name ?? '' }}</th>
                    <th colspan="7">Select specificatoin and price</th>
                </tr>
            </thead>
            <tbody>
                <div>
                    <tr>
                        <th>Memory Size</th>
                        @forelse($memory_sizes as $memory_size)
                            <td class="rounded cursor-pointer border border-dark {{ $selectedMemorySize == $memory_size ? 'bg-success text-white' : 'bg-light' }} "
                                wire:click="selectMemorySize('{{ $memory_size }}')">
                                {{ $memory_size }}
                            </td>
                        @empty
                        @endforelse
                        <td><input type="text" placeholder="Other" wire:model.debounce.500="selectedMemorySize"
                                style="width:60px!important; height:30px;border:none" /></td>
                    </tr>

                    <tr>
                        <th>Condition</th>
                        @forelse($conditions as $condition)
                            <td class=" rounded cursor-pointer border border-dark {{ $selectedCondition == $condition ? 'bg-success text-white' : 'bg-light' }} "
                                wire:click="selectCondition('{{ $condition }}')">
                                {{ $condition }}
                            </td>
                        @empty
                        @endforelse
                    </tr>

                </div>
                @if ($mobileMode || $tabletMode)





                    <tr>
                        <th>Network</th>
                        @forelse($network_providers as $network)
                            <td class="cursor-pointer border border-dark {{ $selectedNetwork == $network['name'] ? 'bg-success' : 'bg-light' }}"
                                wire:click="selectNetwork('{{ $network['name'] }}')">
                                <!-- Click event to select network -->
                                <img src="{{ asset($network['image']) }}" alt="{{ $network['name'] }}"
                                    style="width: 30px; height: 30px;" /> <!-- Display network image -->
                            </td>
                        @empty
                            <td>No networks available</td>
                        @endforelse
                        <td>
                            <input type="text" placeholder="Other" wire:model="selectedNetwork"
                                style="width: 60px; height: 30px; border: none;" />
                        </td>
                    </tr>





                    {{-- <tr>
                        <th>Network</th>
                        @forelse($network_providers as $network)
                            <td class="rounded cursor-pointer border border-dark {{ $selectedNetwork == $network ? 'bg-success text-white' : 'bg-light' }}"
                                wire:click="selectNetwork('{{ $network }}')"> <!-- Select predefined network -->
                                {{ $network }}
                            </td>
                        @empty
                            <td>No networks available</td>
                        @endforelse
                        <td>
                            <input type="text" placeholder="Other" wire:model.debounce.500="selectedNetwork"
                                style="width:60px; height:30px; border:none" />
                        </td>
                    </tr> --}}


                    {{-- <tr>
                        <th>Network</th>
                        @forelse($network_providers as $network)
                            <!-- Loop through predefined network providers -->
                            <td class="rounded cursor-pointer border border-dark {{ $selectedNetwork == $network ? 'bg-success text-white' : 'bg-light' }}"
                                wire:click="selectNetwork('{{ $network }}')">
                                <!-- Set selected style and click event -->
                                {{ $network }} <!-- Display the network name -->
                            </td>
                        @empty
                            <td>No networks available</td> <!-- Optional fallback message -->
                        @endforelse
                        <td>
                            <input type="text" placeholder="Other" wire:model.debounce.500="selectedNetwork"
                                style="width:60px!important; height:30px; border:none" />

                            <!-- Input field for custom networks -->

                        </td>

                    </tr> --}}

                    {{-- <tr>
                        <th>Network/unlocked</th>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" role="switch" class="form-check-input border border-dark"
                                    wire:change="toggleNetworkUnlocked" id="{{ $rand . 'nu' }}" />

                            </div>
                        </td>
                    </tr> --}}
                @endif
            </tbody>
        </table>
        @error('selectedCondition')
            <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class=" d-flex justify-content-between my-3 align-items-center bg-light ">
        <div class=" d-flex gap-2 cursor-pointer " wire:click="clear">
            <i class="fa fa-times text-dark " style="font-size:20px;" aria-hidden="true"></i>
            <h4 class="fw-bold">Clear</h4>
        </div>
        <div>
            <input type="text" placeholder="Enter Price" wire:model.debounce.500="price" />
            @error('price')
                <span class="text-sm text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex gap-2 cursor-pointer align-items-center" wire:click="save" id="{{ $rand }}">
            <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
            <h4 class="fw-bold">Add Price</h4>
            <span wire:loading wire:target="save">saving....</span>
        </div>
    </div>
</div>

<div>
    <div class="my-2">
        <strong>{{ $model->name ?? '' }}</strong>
    </div>
    <div classs="old-spec-addition-form">
        <div class="my-4 d-flex justify-content-center align-items-center flex-column w-50 ">
            <input type="file" wire:model="image" accept="image/jpg,image/png,image/jpeg" multiple />
            <span wire:loading wire:target="image">loading....</span>
        </div>
        <div class=" gap-4  flex-wrap  ">
            <table class="table mx-auto p-5">
                <tbody>
                    <tr>
                        <th>Memory Size</th>
                        @forelse($memory_sizes as $memory_size)
                        <td class="rounded cursor-pointer border border-dark {{ $selectedMemorySize == $memory_size ? 'bg-success text-white' : 'bg-light' }} " wire:click="selectMemorySize('{{ $memory_size }}')">
                            {{ $memory_size }}
                        </td>
                        @empty
                        @endforelse
                        <td><input type="text" placeholder="Other" wire:model.debounce.500="selectedMemorySize" style="width:70px!important; height:30px;border:none" /></td>

                    </tr>

                    <tr>
                        <th>Grade</th>
                        @forelse($grades as $grade)
                        <td class=" rounded cursor-pointer border border-dark {{ $selectedGrade == $grade ? 'bg-success text-white' : 'bg-light' }} " wire:click="selectGrade('{{ $grade }}')">
                            {{ $grade }}
                        </td>
                        @empty
                        @endforelse
                    </tr>
                    <tr>
                        <th>Colours</th>
                        @forelse($colors as $color)
                        <td class="rounded cursor-pointer border border-dark {{ $selectedColor == $color ? 'bg-success text-white' : 'bg-light' }} " wire:click="selectColor('{{ $color }}')">
                            {{ $color }}
                        </td>
                        @empty
                        @endforelse
                        <td><input type="text" placeholder="Other" wire:model.debounce.500="selectedColor" style="width:70px!important; height:30px;border:none" /></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><input type="number" wire:model.debounce.500="quantity" /></td>
                    </tr>
                    @if($selectedCatId==14)
                    <tr>
                        <th>IMEI </th>
                        <td>
                            @for($i = 0; $i
                            < $quantity; $i++) <input class="mt-1" type="text" wire:model.debounce.500="imei.{{ $i }}" placeholder="IMEI {{ $i + 1 }}" oninput="validateIMEIs()" />
                            @endfor
                            <div wire:ignore>
                                <div id="imeisError" class="text-danger"></div>
                                <div id="imeisCount"></div>
                            </div>

                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            @error('error')
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
</div>
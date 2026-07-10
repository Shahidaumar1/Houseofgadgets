

    <div>
        <div class="d-flex">
            <livewire:admin.components.side-nave active="repair" />
            <x-content>
                <livewire:admin.repair.components.top-nav active="price" />
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between gap-4 my-4  ">

                        <a href="{{route('repair-price')}}" class="d-flex gap-2 align-items-center">
                            <button style="border-radius: 30px; color: white; background-color: #dc1e1e; padding: 10px;">
                                    <i class="fa fa-arrow-left text-white " style="font-size:20px;" aria-hidden="true"></i>
                                    
                            </button>
                        </a>
                        <div class=" d-flex gap-2 cursor-pointer" onclick="showM('add-repair')">
                            <button class="btn p-3"  style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px">
                                    Add New Repair
                                </button>
                           
                        </div>
                    </div>
                    <div class="pb-0 mb-2  row">
                        <div class="col-4">
                            <x-alert />
                        </div>
                    </div>


                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <table class="table  table-bordered" id="table_id">
                                <thead class="thead-light">
                                    <tr class="table-secondary"style= "background-color: rgb(192, 192, 239);">
                                        <th>Id</th>
                                        <th>name</th>
                                        <th>Image</th>

                                        <th>How long?</th>
                                        <th>Part Used?</th>
                                        <th>Warranty?</th>
                                        <th>Will my data be lost?</th>
                                        <th>Post-Surgery Advice?</th>
                                        <th>What if you can’t fix my device?</th>
                                        <th>Need a lower priced screen?</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($repair_types as $key => $repair_type)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td wire:ignore>
                                                <livewire:admin.repair.repair-price.components.repair-type-edit :key="uniqid()"
                                                    :repair="$repair_type" />
                                            </td>
                                            <td>
                                                <div x-data="{ open: false }">
                                                    <img src="{{ $repair_type->image ? $repair_type->image : 'https://icon2.cleanpng.com/20180518/ejq/kisspng-logo-maintenance-mobile-phones-mechanic-automobile-5afe7f507561c7.6354452315266281764808.jpg' }}"
                                                        alt="image" style="width:80px;height:80px;"
                                                        @click="open = true" />

                                                    <div x-show="open"
                                                        class="absolute inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50">
                                                        <div class="bg-white p-2 rounded-lg d-flex flex-column gap-2">
                                                            <div class="d-flex justify-content-between ">
                                                                <span class="text-lg font-medium">Edit/Delete</span>
                                                                <span class="text-gray-500 hover:text-gray-800 cursor-pointer "
                                                                    @click="open = false">
                                                                    <i class="fa fa-times"></i>
                                                            </span>
                                                            </div>


                                                                <input type="file" id="newImage" wire:model="newImage"/>

                                                            <div class=" d-flex gap-2 justify-content-between align-items-center">
                                                                <button
                                                                    class="btn btn-danger"
                                                                    wire:click="deleteImage({{ $repair_type->id }})"
                                                                    wire:loading.attr="disabled">
                                                                    Delete
                                                                </button>
                                                                <button
                                                                class="btn btn-success"
                                                                    wire:click="updateImage({{ $repair_type->id }})"
                                                                    wire:loading.attr="disabled">
                                                                    Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div x-data="{ open: false }">
                                                    <span @click="open = true" x-show="open == false"
                                                        wire:click="edit(' {{ $repair_type->duration }}' )">
                                                        @if ($repair_type->duration)
                                                            {{ $repair_type->duration }}
                                                        @else
                                                            <span class="text-muted">No text yet</span>
                                                        @endif

                                                    </span>
                                                    <input x-show="open" type="text" wire:model="newFieldValue"
                                                        style="padding:0px;" @click.away="open = false" />
                                                    <button x-show="open" type="button" class="btn btn-primary"
                                                        wire:click="updateField({{ $repair_type->id }}, 'duration')"
                                                        wire:loading.attr="disabled">
                                                        Save
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div x-data="{ open: false }" wire:poll.1s>
                                                    <span @click="open = true" x-show="open == false"
                                                        wire:click="edit(' {{ $repair_type->part_used }}' )">
                                                        @if ($repair_type->part_used)
                                                            {{ $repair_type->part_used }}
                                                        @else
                                                            <span class="text-muted">No text yet</span>
                                                        @endif
                                                    </span>
                                                    <input x-show="open" type="text" wire:model.lazy="newFieldValue"
                                                        style="padding:0px;" @click.away="open = false"
                                                        value="{{ $repair_type->part_used ?? '' }}" />
                                                    <button x-show="open" type="button" class="btn btn-primary"
                                                        wire:click="updateField({{ $repair_type->id }}, 'part_used')"
                                                        wire:loading.attr="disabled">
                                                        Save
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div x-data="{ open: false }" wire:poll.5s>
                                                    <span @click="open = true" x-show="open == false"
                                                        wire:click="edit(' {{ $repair_type->warranty }}' )">
                                                        @if ($repair_type->warranty)
                                                            {{ $repair_type->warranty }}
                                                        @else
                                                            <span class="text-muted">No text yet</span>
                                                        @endif
                                                    </span>
                                                    <input x-show="open" type="text" wire:model.lazy="newFieldValue"
                                                        style="padding:0px;" @click.away="open = false" />
                                                    <button x-show="open" type="button" class="btn btn-primary"
                                                        wire:click="updateField({{ $repair_type->id }}, 'warranty')"
                                                        wire:loading.attr="disabled">
                                                        Save
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div x-data="{ open: false }" wire:poll.1s>
                                                    <span @click="open = true" x-show="open == false"
                                                        wire:click="edit(' {{ $repair_type->data_loss }}' )">

                                                        @if ($repair_type->data_loss)
                                                            {{ $repair_type->data_loss }}
                                                        @else
                                                            <span class="text-muted">No text yet</span>
                                                        @endif

                                                    </span>
                                                    <input x-show="open" type="text"
                                                        wire:model.lazy="newFieldValue" style="padding:0px;"
                                                        @click.away="open = false" />
                                                    <button x-show="open" type="button" class="btn btn-primary"
                                                        wire:click="updateField({{ $repair_type->id }}, 'data_loss')"
                                                        wire:loading.attr="disabled">
                                                        Save
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div x-data="{ open: false }" wire:poll.1s>
                                                    <span @click="open = true" x-show="open == false"
                                                        wire:click="edit(' {{ $repair_type->advice }}' )">


                                                        @if ($repair_type->advice)
                                                            {{ $repair_type->advice }}
                                                        @else
                                                            <span class="text-muted">No text yet</span>
                                                        @endif
                                                    </span>
                                                    <input x-show="open" type="text"
                                                        wire:model.lazy="newFieldValue" style="padding:0px;"
                                                        @click.away="open = false" />
                                                    <button x-show="open" type="button" class="btn btn-primary"
                                                        wire:click="updateField({{ $repair_type->id }}, 'advice')"
                                                        wire:loading.attr="disabled">
                                                        Save
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div x-data="{ open: false }" wire:poll.1s>
                                                    <span @click="open = true" x-show="open == false"
                                                        wire:click="edit(' {{ $repair_type->no_fix_no_fee }}' )">

                                                        @if ($repair_type->no_fix_no_fee)
                                                            {{ $repair_type->no_fix_no_fee }}
                                                        @else
                                                            <span class="text-muted">No text yet</span>
                                                        @endif
                                                    </span>
                                                    <input x-show="open" type="text"
                                                        wire:model.lazy="newFieldValue" style="padding:0px;"
                                                        @click.away="open = false" />
                                                    <button x-show="open" type="button" class="btn btn-primary"
                                                        wire:click="updateField({{ $repair_type->id }}, 'no_fix_no_fee')"
                                                        wire:loading.attr="disabled">
                                                        Save
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div x-data="{ open: false }" wire:poll.1s>
                                                    <span @click="open = true" x-show="open == false"
                                                        wire:click="edit(' {{ $repair_type->premium_screen }}' )">
                                                        @if ($repair_type->premium_screen)
                                                            {{ $repair_type->premium_screen }}
                                                        @else
                                                            <span class="text-muted">No text yet</span>
                                                        @endif
                                                    </span>
                                                    <input x-show="open" type="text"
                                                        wire:model.lazy="newFieldValue" style="padding:0px;"
                                                        @click.away="open = false" />
                                                    <button x-show="open" type="button" class="btn btn-primary"
                                                        wire:click="updateField({{ $repair_type->id }}, 'premium_screen')"
                                                        wire:loading.attr="disabled">
                                                        Save
                                                    </button>
                                                </div>
                                            </td>
                                    @endforeach

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </x-content>

            

        </div>


        <x-modal title="Add Repair" id="add-repair">
            <livewire:admin.repair.repair-price.components.create-repair-type />
        </x-modal>
    </div>










<div>
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="mt-3 col-md-12" style="display: flex;  justify-content: space-between; align-items: center;">
                <h1>Master Repair Types</h1>
                <a href="javascript:void(0)" wire:click="addRepairType" class="btn btn-success">Add Repair Type</a>
            </div>
        </div>
        <hr>
        <div class="pb-0 mb-2 ml-3 row">
            <div class="col-4">
                <x-alert />
            </div>
        </div>

        @if ($editable)
            <div class="row d-flex justify-content-end ">
                <div class="col-3 ">
                    <livewire:admin.repair.repair-price.components.create-repair-type />
                </div>
            </div>
        @endif
        <div class="row d-flex justify-content-center">
            <div class="col-md-12" style="padding: 40px;">
                <table class="table table-striped table-bordered" id="table_id">
                    <thead class="thead-light">
                        <tr class="table-secondary">
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
                                    <livewire:admin.repair.repair-price.components.repair-type-edit :key="uniqid()" :repair="$repair_type" />
                                </td>
                                <td>
                                    <div x-data="{ open: false }">
                                        <img src="{{ $repair_type->image ? $repair_type->image : 'https://icon2.cleanpng.com/20180518/ejq/kisspng-logo-maintenance-mobile-phones-mechanic-automobile-5afe7f507561c7.6354452315266281764808.jpg' }}"
                                            alt="image" style="width:80px;height:80px;" @click="open = true" />

                                        <div x-show="open"
                                            class="absolute inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50">
                                            <div class="bg-white p-4 rounded-lg">
                                                <div class="flex justify-between mb-4">
                                                    <h2 class="text-lg font-medium">Edit/Delete Image</h2>
                                                    <button class="text-gray-500 hover:text-gray-800"
                                                        @click="open = false">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="flex items-center">
                                                    <label for="newImage" class="w-32 mr-2">New Image:</label>
                                                    <input type="file" id="newImage" wire:model="newImage">
                                                </div>
                                                <div class="mt-4 flex justify-end">
                                                    <button
                                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700"
                                                        wire:click="deleteImage({{ $repair_type->id }})"
                                                        wire:loading.attr="disabled">
                                                        Delete
                                                    </button>
                                                    <button
                                                        class="ml-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700"
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
                                        <input x-show="open" type="text" wire:model.lazy="newFieldValue"
                                            style="padding:0px;" @click.away="open = false" />
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
                                        <input x-show="open" type="text" wire:model.lazy="newFieldValue"
                                            style="padding:0px;" @click.away="open = false" />
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
                                        <input x-show="open" type="text" wire:model.lazy="newFieldValue"
                                            style="padding:0px;" @click.away="open = false" />
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
                                        <input x-show="open" type="text" wire:model.lazy="newFieldValue"
                                            style="padding:0px;" @click.away="open = false" />
                                        <button x-show="open" type="button" class="btn btn-primary"
                                            wire:click="updateField({{ $repair_type->id }}, 'premium_screen')"
                                            wire:loading.attr="disabled">
                                            Save
                                        </button>
                                    </div>
                                </td>

                                {{-- <td class="d-flex justify-content-center">
                                <a href="{{ route('modal-edit',$modal->id) }}"><i class="bi bi-pencil me-3"></i></a>
                                <a href="javascitp:void(0)" wire:click="delete('{{$modal->id}}')"
                                    style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i> </a>
                            </td> --}}
                        @endforeach

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

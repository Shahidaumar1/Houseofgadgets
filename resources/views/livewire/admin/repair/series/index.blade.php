<div class="d-flex">
    <livewire:admin.components.side-nave active="repair" />

    <x-content>
        {{-- top nav --}}
        <livewire:admin.repair.components.top-nav active="series" />

        <div class="container mt-3">
            <h3 class="text-start">Series</h3>

            {{-- Device / Brand / Sub Brand selectors --}}
            <div class="row my-4">
                <div class="col-md-3">
                    <label class="form-label">Device</label>
                    <select class="form-select" wire:model="selectedCatId">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Brand</label>
                    <select class="form-select" wire:model="selectedBrandId">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Sub Brand (optional)</label>
                    <select class="form-select" wire:model="selectedSubBrandId">
                        <option value="">Brand Level (No Sub Brand)</option>
                        @foreach($subBrands as $sb)
                            <option value="{{ $sb->id }}">{{ $sb->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if($selectedBrand)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            Manage Series for
                            <span class="text-primary">{{ $selectedBrand->name }}</span>

                            @if($selectedSubBrand)
                                <span class="text-muted"> / {{ $selectedSubBrand->name }}</span>
                            @else
                                <span class="text-muted"> / Brand Level</span>
                            @endif
                        </h5>

                        {{-- ADD NEW --}}
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label">Series name</label>
                                <input type="text" class="form-control"
                                       wire:model.defer="newSeriesName"
                                       placeholder="e.g. iPhone 15 Series">
                                @error('newSeriesName')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Image (optional)</label>
                                <input type="file" class="form-control" wire:model="newSeriesImage">
                                @error('newSeriesImage')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary w-100" wire:click="createSeries">
                                    Add
                                </button>
                            </div>
                        </div>

                        <hr>

                        <h6>Existing Series</h6>

                        {{-- DRAGGABLE SERIES CARDS --}}
                        <div class="mt-3 d-flex flex-wrap gap-3" id="seriesSortable">
                            @forelse($series as $s)
                                <div class="card border-0 shadow-sm"
                                     style="width: 200px;"
                                     data-id="{{ $s->id }}"
                                     wire:key="series-{{ $s->id }}">
                                    <div class="card-body text-center">

                                        {{-- DRAG HANDLE --}}
                                        <div class="mb-2 d-flex justify-content-end">
                                            <span class="text-muted small drag-handle" style="cursor: grab;">
                                                &#9776;
                                            </span>
                                        </div>

                                        {{-- IMAGE --}}
                                        <div class="mb-2"
                                             style="height:70px; display:flex; align-items:center; justify-content:center;">
                                            @if($s->file)
                                                <img src="{{ asset($s->file) }}"
                                                     alt="{{ $s->name }}"
                                                     style="max-height:70px; max-width:100%;">
                                            @else
                                                <span class="text-muted small">No image</span>
                                            @endif
                                        </div>

                                        {{-- NAME (view) --}}
                                        @if($editingSeriesId !== $s->id)
                                            <div class="fw-semibold mb-2">{{ $s->name }}</div>
                                        @endif

                                        {{-- PUBLISH / PAUSE --}}
                                        <div class="form-check form-switch d-flex justify-content-center mb-2">
                                            <input type="checkbox"
                                                   class="form-check-input"
                                                   wire:change="toggleStatus({{ $s->id }})"
                                                   {{ $s->status == 'Publish' ? 'checked' : '' }}>
                                            <label class="form-check-label ms-1 small">
                                                {{ $s->status == 'Publish' ? 'Publish' : 'Pause' }}
                                            </label>
                                        </div>

                                        {{-- ACTIONS (view) --}}
                                        @if($editingSeriesId !== $s->id)
                                            <div class="d-flex flex-wrap justify-content-center gap-1">
                                                <button class="btn btn-sm btn-outline-primary"
                                                        wire:click="startEdit({{ $s->id }})">
                                                    Edit
                                                </button>

                                                <button class="btn btn-sm btn-outline-secondary"
                                                        wire:click="deleteImage({{ $s->id }})">
                                                    Remove Image
                                                </button>

                                                <button class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Delete this series?')"
                                                        wire:click="deleteSeries({{ $s->id }})">
                                                    Delete
                                                </button>
                                            </div>
                                        @endif

                                        {{-- EDIT MODE --}}
                                        @if($editingSeriesId === $s->id)
                                            <div class="mt-3 text-start">
                                                <label class="form-label small">Name</label>
                                                <input type="text" class="form-control form-control-sm mb-2"
                                                       wire:model.defer="editSeriesName">

                                                <label class="form-label small">Change image (optional)</label>
                                                <input type="file" class="form-control form-control-sm mb-2"
                                                       wire:model="editSeriesImage">

                                                @error('editSeriesName')
                                                    <small class="text-danger d-block">{{ $message }}</small>
                                                @enderror
                                                @error('editSeriesImage')
                                                    <small class="text-danger d-block">{{ $message }}</small>
                                                @enderror

                                                <div class="d-flex justify-content-between mt-2">
                                                    <button class="btn btn-sm btn-success"
                                                            wire:click="updateSeries">
                                                        Save
                                                    </button>
                                                    <button class="btn btn-sm btn-light"
                                                            wire:click="cancelEdit">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @empty
                                <p class="text-muted mb-0">No series yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- SortableJS + Livewire bridge for Series --}}
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
        <script>
            document.addEventListener('livewire:load', function () {

                function initSeriesSortable() {
                    const el = document.getElementById('seriesSortable');
                    if (!el) return;

                    // destroy old instance if Livewire re-rendered
                    if (el._sortable) {
                        el._sortable.destroy();
                    }

                    el._sortable = new Sortable(el, {
                        animation: 150,
                        handle: '.drag-handle',
                        onEnd: function () {
                            let orderedIds = [];
                            el.querySelectorAll('[data-id]').forEach(function (item) {
                                orderedIds.push(item.getAttribute('data-id'));
                            });

                            // direct call into this Livewire component
                            @this.call('reorderSeries', orderedIds);
                        }
                    });
                }

                initSeriesSortable();

                // re-init after any Livewire DOM update
                if (window.Livewire && typeof Livewire.hook === 'function') {
                    Livewire.hook('message.processed', function () {
                        initSeriesSortable();
                    });
                }
            });
        </script>
    </x-content>
</div>

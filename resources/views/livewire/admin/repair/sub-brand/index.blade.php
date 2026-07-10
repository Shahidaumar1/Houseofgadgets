<div class="d-flex">
    <livewire:admin.components.side-nave active="repair" />

    <x-content>
        <livewire:admin.repair.components.top-nav active="sub-brands" />

        <div class="container mt-3">

            <h3 class="text-start">Sub Brands</h3>

            {{-- Device + Brand selectors --}}
            <div class="row my-4">
                <div class="col-md-4">
                    <label class="form-label">Device</label>
                    <select class="form-select" wire:model="selectedCatId">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Brand</label>
                    <select class="form-select" wire:model="selectedBrandId">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if($selectedBrand)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            Manage Sub Brands for
                            <span class="text-primary">{{ $selectedBrand->name }}</span>
                        </h5>

                        {{-- ADD NEW --}}
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label">Sub Brand name</label>
                                <input type="text"
                                       class="form-control"
                                       wire:model.defer="newSubBrandName"
                                       placeholder="e.g. iPhone, Galaxy S">
                                @error('newSubBrandName')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Image (optional)</label>
                                <input type="file" class="form-control" wire:model="newSubBrandImage">
                                @error('newSubBrandImage')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary w-100" wire:click="createSubBrand">
                                    Add
                                </button>
                            </div>
                        </div>

                        <hr>

                        <h6>Existing Sub Brands</h6>

                        {{-- DRAGGABLE LIST --}}
                        <div class="mt-3 d-flex flex-wrap gap-3" id="subBrandSortable">
                            @forelse($subBrands as $sb)
                                <div class="card border-0 shadow-sm"
                                     style="width: 200px;"
                                     data-id="{{ $sb->id }}"
                                     wire:key="subbrand-{{ $sb->id }}">
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
                                            @if($sb->file)
                                                <img src="{{ asset($sb->file) }}"
                                                     alt="{{ $sb->name }}"
                                                     style="max-height:70px; max-width:100%;">
                                            @else
                                                <span class="text-muted small">No image</span>
                                            @endif
                                        </div>

                                        {{-- NAME (view mode) --}}
                                        @if($editingSubBrandId !== $sb->id)
                                            <div class="fw-semibold mb-2">{{ $sb->name }}</div>
                                        @endif

                                        {{-- PUBLISH / PAUSE --}}
                                        <div class="form-check form-switch d-flex justify-content-center mb-2">
                                            <input type="checkbox"
                                                   class="form-check-input"
                                                   wire:change="toggleStatus({{ $sb->id }})"
                                                   {{ $sb->status == 'Publish' ? 'checked' : '' }}>
                                            <label class="form-check-label ms-1 small">
                                                {{ $sb->status == 'Publish' ? 'Publish' : 'Pause' }}
                                            </label>
                                        </div>

                                        {{-- ACTION BUTTONS (view mode) --}}
                                        @if($editingSubBrandId !== $sb->id)
                                            <div class="d-flex flex-wrap justify-content-center gap-1">
                                                <button class="btn btn-sm btn-outline-primary"
                                                        wire:click="startEdit({{ $sb->id }})">
                                                    Edit
                                                </button>

                                                <button class="btn btn-sm btn-outline-secondary"
                                                        wire:click="deleteImage({{ $sb->id }})">
                                                    Remove Image
                                                </button>

                                                <button class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Delete this sub brand?')"
                                                        wire:click="deleteSubBrand({{ $sb->id }})">
                                                    Delete
                                                </button>
                                            </div>
                                        @endif

                                        {{-- EDIT MODE --}}
                                        @if($editingSubBrandId === $sb->id)
                                            <div class="mt-3 text-start">
                                                <label class="form-label small">Name</label>
                                                <input type="text" class="form-control form-control-sm mb-2"
                                                       wire:model.defer="editSubBrandName">

                                                <label class="form-label small">Change image (optional)</label>
                                                <input type="file" class="form-control form-control-sm mb-2"
                                                       wire:model="editSubBrandImage">

                                                @error('editSubBrandName')
                                                    <small class="text-danger d-block">{{ $message }}</small>
                                                @enderror
                                                @error('editSubBrandImage')
                                                    <small class="text-danger d-block">{{ $message }}</small>
                                                @enderror

                                                <div class="d-flex justify-content-between mt-2">
                                                    <button class="btn btn-sm btn-success"
                                                            wire:click="updateSubBrand">
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
                                <p class="text-muted mb-0">No sub brands yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- SortableJS + Livewire --}}
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
        <script>
            document.addEventListener('livewire:load', function () {

                function initSubBrandSortable() {
                    const el = document.getElementById('subBrandSortable');
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
                            @this.call('reorderSubBrands', orderedIds);
                        }
                    });
                }

                initSubBrandSortable();

                // whenever Livewire updates the DOM, re-init sortable
                if (window.Livewire && typeof Livewire.hook === 'function') {
                    Livewire.hook('message.processed', function () {
                        initSubBrandSortable();
                    });
                }
            });
        </script>
    </x-content>
</div>

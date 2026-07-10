<div>
    <div class="my-3">
        @error('error')
        <span class="text-danger">{{$message}}</span>
        @enderror
            <div class="d-flex gap-2 align-items-center w-50">
                <input type="text" placeholder="Enter Title Name, like Memory Size" wire:model.debounce="title"  />
                <button type="button" wire:click="addTitle" class="bg-success text-white">Save</button>
            </div>
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror


        <div class="d-flex gap-2 mt-3">
            <div>
                <select  wire:model="selectedTitle">
                        <option>Select Title</option>
                        @forelse($titles as $value)
                            <option value="{{ $value->title }}">{{ $value->title }}</option>
                        @empty
                        @endforelse

                </select>
            </div>
            <div>
                <input type="text" placeholder="value"  wire:model.debounce.500="value" />
            </div>
            <button type="button" wire:click="addSpec" class="bg-success text-white">Add Spec</button>
        </div>

    </div>
</div>

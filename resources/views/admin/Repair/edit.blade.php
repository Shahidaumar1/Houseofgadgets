@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h1>Edit</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                <form action="{{ route('productU', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="master_id">Device Type</label>
                        <select class="form-select" style="width: 100%" aria-label="Default select example" name="master_id" required>
                          <option  disabled>Select Device Type</option>
                            @foreach($masterCats as $master )
                            <option value="{{ $master->id }}" @if($master->title == $master->title) selected @endif >{{ $master->title }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Model</label>
                        <select class="form-select" style="width: 100%" aria-label="Default select example" name="category_id" required>
                          <option  disabled>Select Model</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->title == $category->title) selected @endif>{{ $category->title }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="broken_screen_o">BROKEN SCREEN (ORIGINAL)</label>
                        <input type="number" name="broken_screen_o" class="form-control" id="broken_screen_o" placeholder="Price"  @if(isset($product)) value="{{ $product->broken_screen_o }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="broken_screen_p">BROKEN SCREEN (PREMIUM GENERIC)</label>
                        <input type="number" name="broken_screen_p" class="form-control" id="broken_screen_p" placeholder="Price" required @if(isset($product)) value="{{ $product->broken_screen_p }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="battery_replacement">BATTERY REPLACEMENT</label>
                        <input type="number" name="battery_replacement" class="form-control" id="battery_replacement" placeholder="Price" required @if(isset($product)) value="{{ $product->battery_replacement }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="screen_battery">SCREEN (GENERIC) & BATTERY REPAIR</label>
                        <input type="number" name="screen_battery" class="form-control" id="screen_battery" placeholder="Price" required @if(isset($product)) value="{{ $product->screen_battery }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="back_plate">BACK PLATE REPAIR</label>
                        <input type="number" name="back_plate" class="form-control" id="back_plate" placeholder="Price" required @if(isset($product)) value="{{ $product->back_plate }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="tablet_complete_screen">TABLET COMPLETE SCREEN REPAIR</label>
                        <input type="number" name="tablet_complete_screen" class="form-control" id="tablet_complete_screen" placeholder="Price" required @if(isset($product)) value="{{ $product->tablet_complete_screen }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="tablet_digitiser">TABLET DIGITISER REPAIR</label>
                        <input type="number" name="tablet_digitiser" class="form-control" id="tablet_digitiser" placeholder="Price" required @if(isset($product)) value="{{ $product->tablet_digitiser }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="tablet_internal_screen">TABLET INTERNAL SCREEN REPAIR</label>
                        <input type="number" name="tablet_internal_screen" class="form-control" id="tablet_internal_screen" placeholder="Price" required @if(isset($product)) value="{{ $product->tablet_internal_screen }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="computer_fan">Computer Fan Repair</label>
                        <input type="number" name="computer_fan" class="form-control" id="computer_fan" placeholder="Price" required @if(isset($product)) value="{{ $product->computer_fan }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="computer_harddrive">Computer Hard Drive Repair</label>
                        <input type="number" name="computer_harddrive" class="form-control" id="computer_harddrive" placeholder="Price" required @if(isset($product)) value="{{ $product->computer_harddrive }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="computer_processor">Computer Processor Repair</label>
                        <input type="number" name="computer_processor" class="form-control" id="computer_processor" placeholder="Price" required @if(isset($product)) value="{{ $product->computer_processor }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="computer_graphic_card">Computer Graphics Card Repairs</label>
                        <input type="number" name="computer_graphic_card" class="form-control" id="computer_graphic_card" placeholder="Price" required @if(isset($product)) value="{{ $product->computer_graphic_card }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="computer_motherboard">Computer Motherboard Repair</label>
                        <input type="number" name="computer_motherboard" class="form-control" id="computer_motherboard" placeholder="Price" required @if(isset($product)) value="{{ $product->computer_motherboard }}" @endif required>
                    </div>
                    <div class="form-group">
                        <label for="computer_ram">Computer RAM Repair</label>
                        <input type="number" name="computer_ram" class="form-control" id="computer_ram" required placeholder="Price" @if(isset($product)) value="{{ $product->computer_ram }}" @endif required>
                    </div>
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit"> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

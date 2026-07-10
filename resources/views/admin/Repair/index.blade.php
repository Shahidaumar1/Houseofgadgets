@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h1>Repair</h1>
            </div>
        </div>
        <hr>
        <div id="wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('Repair-create') }}" class="btn btn-success">Add New Repair</a>
                    </div>
                </div>

                <div class="row">
                    <select class="form-select" aria-label="Default select example" id="searchCat" style="width:20rem;">
                        <option selected value='0'>Show All</option>
                        {{-- @foreach ($repairTypes as $masterCat)
                            <option value="{{ $masterCat->modal->company->id }}">{{ $masterCat->modal->company->name }}
                            </option>
                        @endforeach --}}
                    </select>
                </div>
                @php
                    $company = \App\Models\DeviceType::where('id', 1)->first();
                    // dd($company->modals[1]->repair_types[0]->price)
                @endphp

                <table class="table table-striped table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th>{{ $company->name }}</th>
                            @foreach ($company->repair_types as $repair_type)
                                <td>{{ $repair_type->name }}</td>
                            @endforeach
                        </tr>

                        @foreach ($company->modals as $modal)
                            <tr>
                                <td>{{ $modal->name }}</td>
                                @foreach ($modal->prices as $price)
                                    @if ($price->modal_id == $modal->id)
                                        <td>{{ $price->price }}</td>
                                    @else
                                        <td>....</td>
                                    @endif
                                @endforeach

                            </tr>
                        @endforeach


                        {{-- <tr id="">


                            @foreach ($modals as $modal)
                            <th>{{$modal->id}}</th>
                            <th>{{$modal->name}}</th>
                                @foreach ($modal->repair_types as $repair_type)
                                    <th>{{$repair_type->name}}</th>
                                @endforeach
                            @endforeach

                        </tr> --}}
                    </thead>

                    <tbody>


                    </tbody>


                </table>
            </div>
        </div>
    </div>


















    <script>
        $("#searchCat").change(function() {
            var searchCat = $('#searchCat').val();
            $.ajax({
                url: "{{ route('/searchcat') }}",
                dataType: 'json',
                type: 'get',
                cache: true,
                data: {
                    id: searchCat
                },
                success: function(data) {
                    let htmlData = '';

                    data.forEach(value => {
                        value.modals.forEach(element => {
                            array.forEach(element => {

                            });

                            htmlData += `
                            <th>` + element.id + `</th>
                            <th>` + element.name + `</th>

                        `;
                            $('#mydata').html(htmlData);

                        });
                    });

                    var subCategory = "";
                    data.forEach(function(value) {
                        var priceHtml = "";
                        var hasPrice = false;

                        value.product.forEach(function(product) {

                            product.price = "<td>" + product.price + "</td>"
                            if (product.id == product.id) {
                                priceHtml += product.price;
                                hasPrice = true;
                            }

                        });
                        if (!hasPrice) {
                            priceHtml = "--";

                        }
                        subCategory += `
                        <tr>
                            <td>` + value.id + `</td>
                            <td>` + value.title + `</td>
                            <td>` + priceHtml + `</td>
                        </tr>
                    `;
                    });

                    $('#subCategory').html(subCategory);
                },
            });

        });
    </script>
@endsection

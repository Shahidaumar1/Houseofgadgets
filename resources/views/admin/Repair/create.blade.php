@extends('admin.layouts.app')
@php $companies = \App\Models\Company::get();@endphp
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row" style="padding: 15px;">
                <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                    <h1>Create</h1>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col-3 p-3 ">
                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">@csrf
                        <input type="file" name="file"class="form-control" id="file"style="display:none">
                        <button type="submit" class="btn btn-primary">Import Products</button>
                    </form>
                </div>
                <div class="col-3 p-3 ">
                    <a class="btn btn-success" style="margin-left: -7rem;" href="{{ route('export-product') }}">Export
                        Product</a>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-3">
                    <label for="master_id">Companies</label>
                    <select class="form-select" aria-label="Default select example" id="select_Cat">
                        <option selected disabled>Select Device Type</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}
                        @endforeach
                        </option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="category_id">Select Model</label>
                    <select class="form-select" aria-label="Default select example" name="modal_id" id="mySelect"
                        required>
                        <option selected disabled>Select Model</option>
                    </select>
                </div>

            </div>
            <div class="card"
                style="    margin-left: 41rem;
            position: absolute;
            height: 25rem;margin-top: -9rem;">
                <div class="d-flex justify-content-end border"
                    style="width: 22rem;
                    max-height: 60vh;
                    z-index: 1013;
                    overflow-y: auto;">

                    <table class=table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Repair Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody id="mydata">
                        </tbody>
                    </table>
                </div>
            </div>
            <hr style="width: 32rem">
            <div class="row align-items-start">
                <div class="col-3">
                    <label class="form-label" for="broken_screen_o">Repair Name</label>
                    <input type="text" name="repair_name" class="form-control" id="Repair_name" placeholder="Repair Name"
                        required>
                </div>
                <div class="col-3">
                    <label for="broken_screen_p">Price</label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Price"required>
                </div>
            </div>
            <div class="d-flex justify-content-start" style="padding: 8px">
                <button class="btn btn-primary" type="button" onclick="myFunction()">Create</button>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var form_data = new FormData();

            let selectModel = $('#mySelect').val();
            form_data.append('modal_id', selectModel);

            let name = $('#Repair_name').val();
            form_data.append('name', name);

            let price = $('#price').val();
            form_data.append('price', price);


            $.ajax({
                type: "post",
                url: "{{ route('Repair-store') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    let htmlData = '';
                    data.forEach(value => {
                        console.log(value.repair_type.name);

                        htmlData += `
                    <tr class="gradeX" >
                        <td>` + value.repair_name.name + `</td>
                        <td>` + value.price + `</td>


                    </tr>
                    `
                        $('#mydata').html(htmlData);

                    });
                },
            });

        }


        $("#select_Cat").change(function() {
            var selectCat = $('#select_Cat').val();
            $.ajax({
                url: '/selectCat',
                dataType: 'json',
                type: 'get',
                cache: true,
                data: {
                    id: selectCat
                },
                success: function(data) {

                    let htmlData = '';
                    data.forEach(value => {
                        htmlData += '<option value="' + value.id + '">' + value.name +
                            '</option>';
                    });
                    $('#mySelect').html(htmlData);
                },
            });

        });


        $(document).ready(function() {
            $('#myTable').DataTable({

            });
        });
    </script>
@endsection

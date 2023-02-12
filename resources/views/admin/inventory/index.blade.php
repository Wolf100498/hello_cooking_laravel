@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Inventory</li>
            </ol>
        </nav>
        <h1>Inventory</h1>
    </div>

    <section class="my-3 px-3 py-3 form-category">
        <div class="row">
            <div class="col-11 pe-0">
                {{-- {!! Form::text('date', '', ['id' => 'datepicker']) !!} --}}
                <form action="" method="POST" enctype="multipart/form-data" class="row">
                    @csrf
                    <div class="col-10">
                        <div class="row g-3">
                            <div class="col-6">


                                <input type="text" id="from" class="form-control" name="from"
                                    placeholder="Inventory From Date">




                                {{-- @error('stocks_product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror --}}
                            </div>
                            <div class="col-6">
                                <input type="text" id="to" class="form-control" name="to"
                                    placeholder="Inventory To Date">
                            </div>

                        </div>
                    </div>
                    <div class="col-2 pe-3 ps-0">

                        <button class="btn btn-success float-end w-100" type="submit">Set Date</button>
                    </div>

                    {{-- {!! Form::close() !!} --}}
                </form>
            </div>
            <div class="col-1">
                <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                        class="bi bi-search"></i></button>
            </div>
        </div>
    </section>

    <section class="section p-2">
        <div class="row g-3">
            <div class="card">
                <div class="card-body p-2">
                    <table class="table table-hover mytable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Stock In</th>
                                <th scope="col">Stockout</th>
                                <th scope="col">Stock Left</th>
                                <th scope="col">Stock Sales</th>
                                <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="MM/DD/Year">
                                    Stock Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($inventories as $inventory)
                                <tr>
                                    <th scope="row" class="row"></th>
                                    <td>{{ $inventory->product_name }}</td>
                                    <td>{{ $inventory->stock_in }}</td>
                                    <td>{{ $inventory->stock_out }}</td>
                                    <td>{{ $inventory->stock_left }}</td>
                                    <td>{{ $inventory->stock_sales }}</td>
                                    <td>{{ $inventory->created_at->format('m/d/Y') }}</td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <div class="modal fade search-inventory" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-1">

                            <button type="button" class="btn btn-success">search</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        // $(function() {
        // $("#datepicker").datepicker("option", "dateFormat", 'MM d, yy');
        // });
        $(function() {
            var dateFormat = "mm/dd/yy",
                from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#to").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
    </script>
@endsection

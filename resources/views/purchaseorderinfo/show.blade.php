@extends('dashboard.body.main')

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto my-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-shopping-cart"></i></div>
                        Purchase Order Details
                    </h1>
                </div>
                {{-- <div class="col-auto my-4">
                    <a href="{{ route('purchaseorderinfo.show', $purchase_order_item->purchase_order_info_id) }}" class="btn btn-danger add-list my-1"><i class="fa-solid fa-trash me-3"></i>Clear Search</a>
                </div> --}}
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('purchaseorderinfo.index')}}">Purchase Order</a></li>
                    <li class="breadcrumb-item active">Purchase Order Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- BEGIN: Alert -->
    <div class="container-xl px-4 mt-n4">
        @if (session()->has('success'))
        <div class="alert alert-success alert-icon" role="alert">
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-icon-aside">
                <i class="far fa-flag"></i>
            </div>
            <div class="alert-icon-content">
                {{ session('success') }}
            </div>
        </div>
        @endif
    </div>
    <!-- END: Alert -->
</header>
<!-- END: Header -->


<!-- BEGIN: Main Page Content -->
<div class="container px-2 mt-n10">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row mx-n4">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                              <tr>
                                <th scope="col">No.</th>                                    
                                    <th scope="col">Item</th>
                                    <th scope="col">Shade</th>
                                    <th scope="col">Dimension</th>
                                    <th scope="col">UOM</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Style Name</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Meter</th>
                                    <th scope="col">Quantity Cone</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase_order_items as $purchase_order_item)
                                <tr>
                                    <th scope="row">{{$loop->iteration  }}</th>
                                    <td>{{ $purchase_order_item->item}}</td>
                                    <td>{{ $purchase_order_item->shade  }}</td>
                                    <td>{{ $purchase_order_item->dimension }}</td>
                                    <td>{{ $purchase_order_item->uom }}</td>
                                    <td>{{ $purchase_order_item->color}}</td>
                                    <td>{{ $purchase_order_item->size}}</td>
                                    @php
                                        $quantity =$purchase_order_item->quantity;
                                    @endphp
                                    <td>{{$quantity }}</td>
                                    @php
                                        $value= $purchase_order_item->value
                                    @endphp
                                    <td>{{ number_format($value , 4) }}</td>
                                    <td>{{ $purchase_order_item->style_name}}</td>
                                    <td>{{ $purchase_order_item->count}}</td>
                                    <td>{{ $purchase_order_item->meter}}</td>
                                    @php
                                        $quantity_cone= $purchase_order_item->quantity_cone
                                    @endphp
                                    <td>{{ number_format($quantity_cone , 4)}}</td>
                                    @php
                                        $unit_price= $purchase_order_item->unit_price
                                    @endphp
                                    <td>{{ number_format($unit_price , 4)}}</td>
                                    @php
                                        $total_price= $purchase_order_item->total_price
                                    @endphp
                                    <td>{{ number_format($total_price , 4)}}</td>
                                    <td>{{ $purchase_order_item->status}}</td>
                                    <td>{{ $purchase_order_item->remarks}}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Main Page Content -->
@endsection
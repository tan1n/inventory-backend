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
<div class="container-xl px-2 mt-n10">
    <div class="row">
        <div class="col-xl-12">
            <!-- BEGIN: Product Information -->
            <div class="card mb-12">
                <div class="card-header">
                    Purchase Order Information
                </div>
                <div class="card-body">
                    <!-- Form Group (product name) -->
                    <div class="mb-3">
                        <label class="small mb-1">Title</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->title }}</div>
                        
                    </div>
                    <!-- Form Row -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (type of product category) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Reference No</label>
                        <div class="form-control form-control-solid">{{ $purchase_order_info->ref_no }}</div>
                        </div>
                        <!-- Form Group (type of product unit) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Responsible Person</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->responsible_person }}</div>
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (type of product warehouse) -->
                        <div class="col-md-6">
                            <label class="small mb-1">User</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->user->name }}</div>
                        </div>
                        <!-- Form Group (type of product factory) -->
                        <div class="col-md-6">
                            <label class="small mb-1">PO Ref</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->po_ref }}</div>
                        </div>
                    </div>
                    <!-- Form Row -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (buying price) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Supplier</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->supplier->name }}</div>
                        </div>
                        <!-- Form Group (selling price) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Customer</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->customer->name }}</div>
                        </div>
                    </div>
                    <!-- Form Group (stock) -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (type of product warehouse) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Delivery Place</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->delivery_place }}</div>
                        </div>
                        <!-- Form Group (type of product factory) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Date</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->date}}</div>
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-12">
                            <label class="small mb-1">Status</label>
                            <div class="form-control form-control-solid">{{ $purchase_order_info->status}}</div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <a class="btn btn-primary" href="{{ route('purchaseorderinfo.index') }}">Back</a>
                </div>
            </div>
            <!-- END: Product Information -->
        </div>
    </div>
</form>
</div>
<!-- BEGIN: Main Page Table Content -->
<div class="container-fluid px-2 mt-5">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row mx-n4">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                              <tr>
                                <th scope="col">No.</th>                                    
                                <th scope="col">Product Name</th>                                    
                                <th scope="col">Item</th>
                                <th scope="col">Shade</th>
                                <th scope="col">Dimension</th>
                                <th scope="col">UOM</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Order Quantity</th>
                                <th scope="col">Received Quantity</th>
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
                                    <td>{{ $purchase_order_item->product->product_name}}</td>
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
                                    <td>{{$purchase_order_item->received_quantity }}</td>
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
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-sm mx-1" data-toggle="modal" data-target="#modal-receive-{{$loop->iteration}}">
                                            Stock Update
                                        </button>
                                        @include('purchaseorderinfo.received-modal')
                                    </td>
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
<!-- END: Main Page Table Content -->
<!-- END: Main Page Content -->
@endsection
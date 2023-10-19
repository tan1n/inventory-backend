@extends('dashboard.body.main')

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-warehouse"></i></div>
                        Details Warehouse
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warehouse.index') }}">Warehouses</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Main Page Content -->
<div class="container-xl px-2 mt-n10">
        <div class="row col-xl-12 justify-content-center">
            <div class="col-xl-8">
                <!-- BEGIN: Warehouse Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        Warehouse Information
                    </div>
                    <div class="card-body">
                        <!-- Form Group (Warehouse name) -->
                        <div class="mb-3">
                            <label class="small mb-1">Warehouse name</label>
                            <div class="form-control form-control-solid">{{ $warehouse->name }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Reponsible Person</label>
                            <div class="form-control form-control-solid">{{ $warehouse->responsible_person}}</div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Contact No of the Person Responsible</label>
                            <div class="form-control form-control-solid">{{ $warehouse->contact_no_responsible}}</div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Location</label>
                                <div class="form-control form-control-solid">{{ $warehouse->location}}</div>
                        </div>
                        

                        <!-- Submit button -->
                        <a class="btn btn-primary" href="{{ route('warehouse.index') }}">Back</a>
                    </div>
                </div>
                <!-- END: Warehouse Information -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->
@endsection

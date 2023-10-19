@extends('dashboard.body.main')

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-industry"></i></div>
                        Details Factory
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('factory.index') }}">Factories</a></li>
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
                <!-- BEGIN: Factory Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        Factory Information
                    </div>
                    <div class="card-body">
                        <!-- Form Group (Factory name) -->
                        <div class="mb-3">
                            <label class="small mb-1">Factory name</label>
                            <div class="form-control form-control-solid">{{ $factory->name }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Reponsible Person</label>
                            <div class="form-control form-control-solid">{{ $factory->responsible_person}}</div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Contact No of the Person Responsible</label>
                            <div class="form-control form-control-solid">{{ $factory->contact_no_responsible}}</div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Location</label>
                                <div class="form-control form-control-solid">{{ $factory->location}}</div>
                        </div>
                        

                        <!-- Submit button -->
                        <a class="btn btn-primary" href="{{ route('factory.index') }}">Back</a>
                    </div>
                </div>
                <!-- END: Factory Information -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->
@endsection

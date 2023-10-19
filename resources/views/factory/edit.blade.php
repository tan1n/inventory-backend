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
                        Edit Factory
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('factory.index') }}">Factories</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Main Page Content -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('factory.update', $factory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-12">
                <!-- BEGIN: factory Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        factory Details
                    </div>
                    <div class="card-body">
                        <!-- Form Group (factory name) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">factory name <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name', $factory->name) }}" autocomplete="off"/>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="responsible_person">Reponsible Person<span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('responsible_person') is-invalid @enderror" id="responsible_person" name="responsible_person" type="text" placeholder="" value="{{ old('responsible_person', $factory->responsible_person) }}" autocomplete="off"/>
                            @error('responsible_person')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="contact_no_responsible">Contact No of the Person Responsible<span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('contact_no_responsible') is-invalid @enderror" id="contact_no_responsible" name="contact_no_responsible" type="text" placeholder="" value="{{ old('contact_no_responsible', $factory->contact_no_responsible) }}" autocomplete="off"/>
                            @error('contact_no_responsible')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="location">Location<span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('location') is-invalid @enderror" id="location" name="location" type="text" placeholder="" value="{{ old('location', $factory->location) }}" autocomplete="off"/>
                            @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <!-- Submit button -->
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a class="btn btn-danger" href="{{ route('factory.index') }}">Cancel</a>
                    </div>
                </div>
                <!-- END: Factory Details -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->
@endsection

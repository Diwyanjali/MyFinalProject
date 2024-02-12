@extends('backend.layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Specializations</h6>

                            <form method="POST" action="{{ route('admin.doctors.specializations.store') }}" class="forms-sample">
                                @csrf

                                <!--name-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label"> Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--description-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Description <span class="text-danger">*</span></label>
                                    <input type="text" name="description"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{ old('description') }}">
                                    @error('description')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Create</button>
                                <button class="btn btn-secondary" type="button">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

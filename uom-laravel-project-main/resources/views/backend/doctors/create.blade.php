@extends('backend.layouts.app')

@section('content')

    <div class="page-content">

        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Doctor</h6>

                            <form method="POST" action="{{ route('admin.doctors.store') }}">
                                @csrf

                                <!--doctor code-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Doctor Code <span class="text-danger">*</span></label>
                                    <input type="text" name="code"
                                        class="form-control @error('code') is-invalid @enderror" placeholder="Doctor Code" value="{{ old('code') }}">
                                    @error('code')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--doctor name-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Doctor Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Doctor Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                 <!--email-->
                                 <div class="mb-3">
                                    <label class="form-label">E-mail <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--doctor specialization-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Doctor Specialization <span class="text-danger">*</span></label>
                                    <select name="specialization_id"
                                        class="form-control @error('specialization_id') is-invalid @enderror">
                                        <option value="">Select Specialization</option>
                                        @foreach ($specialization as $spz)
                                            <option value="{{ $spz->id }}" @selected(old('specialization_id') == $spz->id)>{{ $spz->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('specialization_id')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--description-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea type="text" name="description"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <p><strong>Note: </strong> Doctor's login password will be automatically generated and login details will be emailed to the email address provided.</p>
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Create</button>
                                <button class="btn btn-secondary" type="reset">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

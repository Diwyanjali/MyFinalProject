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

                            <h6 class="card-title">Edit Doctor</h6>

                            <form method="POST" action="{{ route('admin.doctors.update', $doctors->id) }}" class="forms-sample">
                                @csrf
                                @method('PUT')

                                <!--doctor code-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Doctor Code <span class="text-danger">*</span></label>
                                    <input type="text" name="code"
                                        class="form-control @error('code') is in-valid @enderror"
                                        value="{{ $doctors->code }}">
                                    @error('code')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--doctor name-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Doctor Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is in-valid @enderror"
                                        value="{{ $doctors->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--doctor specialization-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Doctor Specialization <span class="text-danger">*</span></label>
                                    <select name="specialization_id"
                                        class="form-control @error('specialization_id') is in-valid @enderror ">
                                        @foreach ($specialization as $spz)
                                            <option @if ($spz->id == $doctors->specialization_id) seleted @endif
                                                value="{{ $spz->id }}">{{ $spz->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('specialization_id')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--description-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Doctor Description</label>
                                    <textarea type="text" name="description"
                                        class="form-control @error('description') is in-valid @enderror"
                                        >{{ $doctors->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <button class="btn btn-secondary" type="button">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

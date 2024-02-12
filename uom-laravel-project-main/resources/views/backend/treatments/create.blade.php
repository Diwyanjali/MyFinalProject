@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Treatment</h6>

                            <form method="POST" action="{{ route('admin.treatments.store') }}">
                                @csrf

                                <!--treatment name-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Treatment Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Treatment Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--description-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Treatment Description <span class="text-danger">*</span></label>
                                    <textarea type="text" name="description"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--status-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Treatment Status <span class="text-danger">*</span></label>
                                    <select name="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value=" ">Select Status</option>
                                        <option value="1" @selected(old('status') == 1)>Active</option>
                                        <option value="0" @selected(old('status') == 0)>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
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

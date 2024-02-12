@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Drug</h6>

                            <form method="POST" action="{{ route('admin.drugs.update', $drug->id) }}">
                                @csrf
                                @method('PUT')

                                <!--drug id-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Drug Id <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="drug_id"
                                        class="form-control @error('drug_id') is-invalid @enderror" placeholder="Drug ID"
                                        value="{{ $drug->drug_id }}" disabled>
                                    @error('drug_id')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--drug name-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Drug Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Drug Name"
                                        value="{{ $drug->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--description-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Drug Description</label>
                                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Description">{{ $drug->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--quantity-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Drug Quantity <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="quantity"
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        placeholder="Drug Quantity" value="{{ $drug->quantity }}">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--status-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Drug Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        <option value="1" @if($drug->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($drug->status == 0) selected @endif>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <button class="btn btn-secondary" type="reset">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

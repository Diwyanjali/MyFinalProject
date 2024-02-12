@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Doctor Time slot</h6>

                            <form method="POST" action="{{ route('admin.time_slot.doctor.update', $doctor_time_slot->id) }}">
                                @method('PUT')
                                @csrf

                                <!--doctor id-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Doctor<span
                                            class="text-danger">*</span></label>
                                    <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
                                        <option value="">Select the doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" @if($doctor->id == $doctor_time_slot->doctor_id) selected @endif>{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--date-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') is-invalid @enderror" placeholder="Date" value="{{ $doctor->date }}">
                                    @error('date')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--time slot-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Time Slot <span
                                            class="text-danger">*</span></label>
                                    <select name="time_slot_id" class="form-control @error('time_slot_id') is-invalid @enderror">
                                        <option value="">Select the time slot</option>
                                        @foreach ($time_slots as $time_slot)
                                            <option value="{{ $time_slot->id }}" @if($time_slot->id == $doctor_time_slot->time_slot_id) selected @endif>{{ $time_slot->slot }}</option>
                                        @endforeach
                                    </select>
                                    @error('time_slot_id')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <!--status-->
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        <option value="1" @if($doctor_time_slot->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($doctor_time_slot->status == 0) selected @endif>De Active</option>
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

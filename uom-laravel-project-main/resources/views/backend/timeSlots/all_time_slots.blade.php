@extends('backend.layouts.app')

@section('content')

<div class="page-content">

    {{-- <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        <a href="{{ route('add.doctors.specialization')}}" class="btn btn-inverse-info">Add Specialization</a>
        </ol>
    </nav> --}}

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Time Slots</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Time Slot</th>
                                    <th>Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($timeSlots as $key => $time)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$time->slot}}</td>
                                    <td>
                                        @if($time->status==1)
                                        <span class="badge bg-success">ACTIVE</span>
                                        @elseif ($time->status==0)
                                        <span class="badge bg-danger">INACTIVE</span>
                                        @endif

                                    </td>
                                    {{-- <td>
                                        <a href="{{route('edit.doctor', $time->id)}}" class="btn btn-warning">Edit</a>
                                        <a href="{{route('delete.doctor', $time->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                    </td> --}}
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

@endsection

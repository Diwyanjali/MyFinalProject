@extends('backend.layouts.app')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('admin.doctors.create') }}" class="btn btn-info">Add Doctor</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Doctor Management</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Doctor Code</th>
                                        <th>Name</th>
                                        <th>Doctor Specialization </th>
                                        <th>Doctor Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $key => $doctor)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $doctor->code }}</td>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->doctor_specialization->name }}</td>
                                            <td>{{ $doctor->description }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.doctors.show', $doctor->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{ route('admin.doctors.delete', $doctor->id) }}"
                                                    class="btn btn-danger" id="delete">Delete</a>
                                            </td>
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

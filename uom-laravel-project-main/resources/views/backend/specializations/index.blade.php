@extends('backend.layouts.app')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('admin.doctors.specializations.create') }}" class="btn btn-info">
                    Add Specialization
                </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Specializations</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($specializations as $key => $spz)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $spz->name }}</td>
                                            <td>{{ $spz->description }}</td>
                                            <td>
                                                <a href="{{ route('admin.doctors.specializations.show', $spz->id) }}"
                                                    class="btn btn-warning">Edit</a>

                                                @if(!count($spz->doctors))    
                                                <a href="{{ route('admin.doctors.specializations.delete', $spz->id) }}"
                                                    class="btn btn-danger" id="delete">Delete</a>
                                                @endif    
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

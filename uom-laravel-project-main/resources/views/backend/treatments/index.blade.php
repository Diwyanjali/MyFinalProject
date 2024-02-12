@extends('backend.layouts.app')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('admin.treatments.create') }}" class="btn btn-info">
                    Add Treatment
                </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Treatment Management</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($treatments as $key => $treatment)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $treatment->name }}</td>
                                            <td>{{ $treatment->description }}</td>
                                            <td>
                                                @if ($treatment->status == 1)
                                                    <span class="badge bg-success">ACTIVE</span>
                                                @elseif ($treatment->status == 0)
                                                    <span class="badge bg-danger">INACTIVE</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.treatments.show', $treatment->id) }}"
                                                    class="btn btn-warning">Edit</a>

                                                <a href="{{ route('admin.treatments.delete', $treatment->id) }}"
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

@extends('backend.layouts.app')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('admin.drugs.create') }}" class="btn btn-info">
                    Add Drug
                </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Drug Management</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drugs as $key => $drug)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $drug->name }}</td>
                                            <td>{{ $drug->description }}</td>
                                            <td>
                                                @if($drug->quantity == 0)
                                                <span class="badge text-bg-danger">Out of Stock</span>
                                                @else 
                                                    {{ $drug->quantity }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($drug->status == 1)
                                                    <span class="badge bg-success">ACTIVE</span>
                                                @elseif ($drug->status == 0)
                                                    <span class="badge bg-danger">INACTIVE</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.drugs.show', $drug->id) }}"
                                                    class="btn btn-warning">Edit</a>

                                                <a href="{{ route('admin.drugs.delete', $drug->id) }}"
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

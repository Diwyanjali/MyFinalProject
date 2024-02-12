@extends('backend.layouts.app')

@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Customer Feedbacks</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Service</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedbacks as $key => $feedback)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $feedback->created_at->format('Y-m-d H:m A') }}</td>
                                            <td>{{ $feedback->User->name }}</td>
                                            <td>{{ $feedback->service }}</td>
                                            <td>{{ $feedback->comment }}</td>
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

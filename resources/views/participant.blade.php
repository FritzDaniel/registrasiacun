@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ __('Participant Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('participant_create') }}" class="btn btn-success mb-3">Create Participant</a>

                    <table id="participant" class="display table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Unique Code</th>
                                <th>Name</th>
                                <td>Company</td>
                                <td>Category</td>
                                <td>Attend</td>
                                <td>VIP Room</td>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participant as $key => $par)
                            <tr>
                                <td>{{ $key+1 }}.</td>
                                <td>{{ $par->unique_code }}</td>
                                <td>{{ $par->name }}</td>
                                <td>{{ $par->company }}</td>
                                <td>{{ $par->Category->cat_name }}</td>
                                <td>{{ $par->absence_time != null ? "Hadir" : "Belum" }}</td>
                                <td>{{ $par->vip !=0 ? "Yes" : "No" }}</td>
                                <td>{{ $par->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
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
@endsection

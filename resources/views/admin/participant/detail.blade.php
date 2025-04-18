@extends('admin.layouts.app')

@section('title')
    Acun-Digital | Admin Dashboard
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('participant') }}">Participant</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('headerTitle')
    Participant
@endsection

@section('content')

    <div class="container-fluid">
        <a href="{{ route('participant') }}" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Back</a>
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ session('message') }}
                    </div>
                @endif
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Participant detail</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <h5>{{ $data->unique_code }}</h5>
                        <br>
                        <p>Name: {{ $data->name }}</p>
                        <p>Company: <b>{{ $data->company ? $data->company : 'No company' }}</b></p>
                        <p>Category : {{ $data->category ? $data->Category->cat_name : '-' }}</p>
                        <p>Jersey : {{ $data->jersey ? $data->jersey : '-' }}</p>
                        <p>Vip room : {{ $data->vip !=0 ? 'Yes' : 'No' }}</p>
                        <p>Description : {{ $data->description ? $data->description : '-' }}</p>
                        <p>No Flight : {{ $data->no_flight ? $data->no_flight : '-' }}</p>
                        <p>Payment Status : {{ $data->payment_status !=0 ? 'Sudah Lunas' : 'Belum Lunas' }}</p>
                        <p>Invitation : {{ $data->invitation !=0 ? 'Sent' : 'Not yet' }}</p>
                        <p>Attendance : {{ $data->absence_time !=null ? 'Sudah hadir' : 'Belum hadir' }}</p>
                        @if($data->absence_time != null)
                            <p>Arrived time : {{ Carbon\Carbon::parse($data->absence_time)->format('d-M-Y H:i:s') }} <a href="{{ route('participant.undoAttend', $data->id) }}">Reset</a></p>
                        @endif
                        <p>Eligible to Attend? : {{ $data->eligible_to_attend !=0 ? "Yes" : "Banned" }}</p>
                        <p>Created by : {{ $data->created_by ? $data->User->name : '-' }}</p>
                        <p>Created at : {{ \Carbon\Carbon::parse($data->created_at)->format('d-M-Y H:i') }}</p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Updated at {{ \Carbon\Carbon::now()->format('d-m-Y') }}
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection

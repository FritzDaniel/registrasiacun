@extends('admin.layouts.app')

@section('title')
    Acun-Digital | Attendance
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('attendance') }}">Attendance</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('headerTitle')
    Attendance
@endsection

@section('content')

    <div class="container-fluid">
        <a href="{{ route('attendance') }}" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Back</a>
        <div class="row">
            <div class="col-12">
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
                        <p>Company: {{ $data->company ? $data->company : 'No company' }}</p>
                        <p>Category : <b>{{ $data->category ? $data->Category->cat_name : '-' }}</b></p>
                        <p>Jersey : {{ $data->jersey ? $data->jersey : '-' }}</p>
                        <p>Vip room : {{ $data->vip !=0 ? 'Yes' : 'No' }}</p>
                        <p>Description : {{ $data->description ? $data->description : '-' }}</p>
                        <p>No Flight : {{ $data->no_flight ? $data->no_flight : '-' }}</p>
                        <p>Payment Status : {{ $data->payment_status !=0 ? 'Sudah Lunas' : 'Belum Lunas' }}</p>
                        <p>Invitation : {{ $data->invitation !=0 ? 'Sent' : 'Not yet' }}</p>                        
                        <p>Eligible to Attend? : {{ $data->eligible_to_attend !=0 ? "Yes" : "Banned" }}</p>
                        <p>Created by : {{ $data->created_by ? $data->User->name : '-' }}</p>
                        <p>Attendance : {{ $data->absence_time !=null ? 'Sudah hadir' : 'Belum hadir' }}</p>
                        @if($data->absence_time != null)
                            <p>Arrived time : {{ Carbon\Carbon::parse($data->absence_time)->format('H:i:s') }}</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        @if($data->eligible_to_attend == 1) 
                            @if($data->absence_time == null) 
                                <a href="{{ route('attendance.attend', $data->id) }}" class="btn btn-success confirm">Attend</a>
                            @else 
                                Updated at {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}
                            @endif
                        @else 
                            <h4 style="color: red">Not Eligible to Attend!</h4>
                        @endif
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $("a.confirm").click(function(e){
            if(!confirm('Are you sure this participant is arrived and confirmed?')){
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script>
@endsection

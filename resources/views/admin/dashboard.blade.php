@extends('admin.layouts.app')

@section('title')
    Eagle Golf Indo | Dashboard
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('headerTitle')
    Dashboard
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $allParticipant }}</h3>

                        <p>All Participant</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $attendParticipant }}</h3>

                        <p>Participants attended</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $remainingParticipant }}</h3>

                        <p>Participants has not arrived</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection

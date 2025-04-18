@extends('admin.layouts.app')

@section('title')
    Acun-Digital | Logs
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Logs</li>
@endsection

@section('headerTitle')
    Logs
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                @if($logs->isEmpty())
                    No Data
                @else
                    @foreach ($logs as $log)
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $log->action }}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                {{ $log->message }}
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                Created at: {{ \Carbon\Carbon::parse($log->created_at)->format('d-m-Y H:i:s') }}
                            </div>
                            <!-- /.card-footer-->
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            @if ($logs->onFirstPage())
                                <span class="btn btn-outline-secondary disabled">&laquo; Previous</span>
                            @else
                                <a class="btn btn-outline-secondary" href="{{ $logs->previousPageUrl() }}">&laquo; Previous</a>
                            @endif
                        </div>
                        <div>
                            @if ($logs->hasMorePages())
                                <a class="btn btn-outline-secondary" href="{{ $logs->nextPageUrl() }}">Next &raquo;</a>
                            @else
                                <span class="btn btn-outline-secondary disabled">Next &raquo;</span>
                            @endif
                        </div>
                    </div>
                @endif
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection

@extends('admin.layouts.app')

@section('title')
    Eagle Golf Indo | Account
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('account') }}">Account</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headerTitle')
    Account
@endsection

@section('content')

    <div class="container-fluid">
        <a href="{{ route('account') }}" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Back</a>
        <div class="row">
            <div class="col-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> There were some problems with your input!</h4>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Account create</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="accountSubmit" class="fpms" action="{{ route('account.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Input name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Input email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Input password" value="{{ old('password') }}">
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button id="submitForm" class="btn btn-success bpms">Save</button>
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
        $('#submitForm').on('click',function(){
            $('#accountSubmit').submit();
        });
    </script>
@endsection

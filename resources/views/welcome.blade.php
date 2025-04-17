@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Absence Participant') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route("check_participant") }}" method="GET">
                        <div class="form-group">
                            <label for="">Input Uniq Code</label>
                            <input type="text" class="form-control" name="uniq_code" required>
                        </div>
                        <input type="submit" class="btn btn-success mt-3" value="Check">      
                    </form>       

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title')
    Eagle Golf Indo | Participant
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('participant') }}">Participant</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('headerTitle')
    Participant
@endsection

@section('content')

    <div class="container-fluid">
        <a href="{{ route('participant') }}" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Back</a>
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
                        <h3 class="card-title">Participant create</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formSubmit" action="{{ route('participant.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="#">Category*</label>
                                <select class="form-control" name="category">
                                    <option value="">Select Option</option>
                                    @foreach($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">Unique Code*</label>
                                <input type="text" name="unique_code" class="form-control" placeholder="Unique Code" value="{{ old('unique_code') }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">Name*</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">Company*</label>
                                <input type="text" name="company" class="form-control" placeholder="Nama Perusahaan" value="{{ old('company') }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">Jersey</label>
                                <select class="form-control" name="jersey">
                                    <option value="">Select Option</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">No Flight</label>
                                <input type="number" name="no_flight" class="form-control" placeholder="No Flight">
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">VIP Room</label>
                                <select class="form-control" name="vip">
                                    <option value="0">Select Option</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">Payment Status</label>
                                <select class="form-control" name="payment_status">
                                    <option value="0">Select Option</option>
                                    <option value="1">Lunas</option>
                                    <option value="0">Belum Lunas</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">Invitation</label>
                                <select class="form-control" name="invitation">
                                    <option value="0">Select Option</option>
                                    <option value="1">Sent</option>
                                    <option value="0">Not Yet</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">Description</label>
                                <textarea class="form-control" rows="2" placeholder="Keterangan" name="description">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="#">Eligible for attend?</label>
                                <div class="icheck-primary">
                                    <!-- Hidden input dikirim saat checkbox tidak dicentang -->
                                    <input type="hidden" name="eligible_to_attend" value="0">
                                    <input type="checkbox" name="eligible_to_attend" value="1" checked>
                                </div>
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
        $('#formSubmit').submit();
    });
</script>

@endsection

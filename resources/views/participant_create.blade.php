@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="{{ route('participant') }}" class="btn btn-info mb-3">< Back</a>

            <div class="card">
                <div class="card-header">{{ __('Create Participant') }}</div>

                <div class="card-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <h4><i class="icon fa fa-ban"></i> There were some problems with your input!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    
                    <form action="{{ route('participant_store') }}" method="POST">
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
                            <input type="text" name="unique_code" class="form-control" placeholder="Unique Code">
                        </div>
                        <div class="form-group mb-2">
                            <label for="#">Name*</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group mb-2">
                            <label for="#">Company*</label>
                            <input type="text" name="company" class="form-control" placeholder="Nama Perusahaan">
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
                            <textarea class="form-control" rows="2" placeholder="Keterangan" name="description"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-sm mt-2" name="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <form action="{{ route('category_store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="#">Category Name</label>
                            <input type="text" name="cat_name" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success btn-sm mt-3" name="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

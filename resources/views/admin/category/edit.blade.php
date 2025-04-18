@extends('admin.layouts.app')

@section('title')
    Acun-Digital | Category
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('category') }}">Category</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('headerTitle')
    Category
@endsection

@section('content')

    <div class="container-fluid">
        <a href="{{ route('category') }}" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Back</a>
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category create</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="categorySubmit" class="fpms" action="{{ route('category.update', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="cat_name" class="form-control" placeholder="Input category" value="{{ $data->cat_name }}">
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button id="submitForm" class="btn btn-primary bpms">Update</button>
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
        $('#categorySubmit').submit();
    });
</script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
@endsection

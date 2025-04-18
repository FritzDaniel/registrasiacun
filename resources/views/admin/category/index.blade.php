@extends('admin.layouts.app')

@section('title')
    Acun-Digital | Category
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Category</li>
@endsection

@section('headerTitle')
    Category
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List category</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Category</a>
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <table id="datatable" class="table table-bordered table-hover dataTable dtr-inline">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category name</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($category->isEmpty())
                                    <tr>
                                        <td>No Data</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @else
                                    @foreach($category as $key => $cat)
                                        <tr>
                                            <td>{{ $key+1 }}.</td>
                                            <td>{{ $cat->cat_name }}</td>
                                            <td>{{ $cat->created_at }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $cat->id ) }}" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
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
    <script>
        $(function () {
            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection

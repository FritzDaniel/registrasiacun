@extends('admin.layouts.app')

@section('title')
    Acun-Digital | Participant
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Participant</li>
@endsection

@section('headerTitle')
    Participant
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
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List participant</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('participant.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Add Participant</a>
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <table id="datatable" class="table table-bordered table-hover dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unique Code</th>
                                        <th>Name</th>
                                        <td>Company</td>
                                        <td>Category</td>
                                        <td>Attendance</td>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($participant->isEmpty())
                                    <tr>
                                        <td>No Data</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @else
                                @foreach($participant as $key => $par)
                                    <tr>
                                        <td>{{ $key+1 }}.</td>
                                        <td>{{ $par->unique_code }}</td>
                                        <td>{{ $par->name }}</td>
                                        <td>{{ $par->company }}</td>
                                        <td>{{ $par->Category->cat_name }}</td>
                                        <td>{{ $par->absence_time != null ? "Hadir" : "Belum" }}</td>
                                        <td>
                                            <a href="{{ route('participant.detail', $par->id) }}" class="btn btn-sm btn-warning">Detail</a>
                                            <a href="{{ route('participant.edit', $par->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ route('participant.delete', $par->id) }}" class="btn btn-sm btn-danger confirm">Delete</a>
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

    <script>
        $(document).ready(function(){
            $("a.confirm").click(function(e){
                if(!confirm('Are you sure want to delete this participant?')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>
@endsection

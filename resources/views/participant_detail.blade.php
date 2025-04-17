@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Participant Detail') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ $people->unique_code }} <br>
                    Nama : {{ $people->name }}  <br>
                    Perusahaan : {{ $people->company }} <br>
                    Kategory : {{ $people->Category->cat_name }} <br>
                    Vip Room : {{ $people->vip != 0 ? "Yes" : "No" }} <br>
                    Kehadiran : {{ $people->absence_time != null ? "Sudah Hadir" : "Belum Hadir" }} <br>
                    @if($people->absence_time != null)
                        Jam kehadiran : {{ Carbon\Carbon::parse($people->absence_time)->format('H:i:s') }}
                    @endif

                    <div class="flex mt-3">
                        @if($people->absence_time == null) 
                            <a href="{{ route('participant_absence', $people->id) }}" class="btn btn-success confirm">Tandai Sudah Hadir</a>
                        @endif
                        <a href="{{ route('landing') }}" class="btn btn-danger">Kembali</a>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

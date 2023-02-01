@extends('layouts.app')
@section('title', 'Notifikasi')
@section('content')


<div class="container">

    <h1>Notifikasi</h1>


    @if (session()->has('approval'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('approval') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif
    @if (session()->has('danger'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <div class="col-sm">


        @foreach ($notification as $data )

        @if ($data->type == 10001)
            <a href="/get-approval-register/{{$data->id_referensi}}/{{$data->id}}">
        @elseif ($data->type == 20001)
            <a href="/detail-pelatihan/{{$data->id_referensi}}/{{$data->id}}">

        @endif


            <div class="card my-2">
                <div class="card-body ">
                    <div class="row align-middle">
                        <div class="col-sm-10">
                            <div class="row ">
                                <div class="font-weight-bold">{{ ++$i }}. {{ $data->title }}</div>
                            </div>
                            <div class="row">

                                <div>{{ $data->body }}</div>
                            </div>

                        </div>
                        <div class="col-sm text-center">

                            @if ( $data->dilihat == 0 )

                            <i class="bi bi-eye-fill " style="vertical-align:middle"></i>
                            @else

                            <i class="bi bi-eye-slash"></i>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </a>


        @endforeach

    </div>


</div>


@endsection
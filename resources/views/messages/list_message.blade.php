@extends('layouts.app')
@section('title', 'Messages')
@section('content')


<div class="container">

    <h1>Messages</h1>



    @if (session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
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


    @foreach ($message as $list )
    <a href="/get-messages-detail/{{$list['id']}}">

        <div class="card mt-2">
            <div class="card-body">

                <div class="row align-items-center " style="background-color: white;">

                    <div class="row ml-2">

                        <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg ') }} " style="width: 30px;">

                        <div class="text-left font-weight-bold ml-2"> {{ $list['karyawan']['first_name'] }} {{ $list['karyawan']['last_name'] }} - {{ $list['karyawan']['nik'] }}</div>
                        <div class="text-right ml-2" style="font-size:small"> {{ $list['created_at'] }} </div>

                    </div>
                </div>
                <div class="row ml-2 mt-2">
                    {{ $list['message'] }}
                </div>

            </div>
        </div>
    </a>

    @endforeach

</div>


@endsection
@extends('layouts.app')
@section('title', 'Message')
@section('content')


<div class="container">

    <h1>Message</h1>

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

    @if ($list->nik != $user->nik )

    <div class="card mt-2">
        <div class="card-body">

            <div class="row align-items-center " style="background-color: white;">

                <div class="row ml-2">

                    <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg ') }} " style="width: 30px;">

                    <div class="text-left font-weight-bold ml-2"> {{ $list->karyawan->first_name }} {{ $list->karyawan->last_name }} - {{ $list->karyawan->nik }} </div>
                    <div class="text-right ml-2" style="font-size:small"> {{ $list->created_at }} </div>
                
                </div>
            </div>
            <div class="row ml-2 mt-2">
                {{ $list->message }}
            </div>

        </div>
    </div>
    @else
    <div class="card mt-2">
        <div class="card-body">


            <div class=" d-flex justify-content-end ">

                <div class="text-right mr-2" style="font-size:small"> {{ $list->created_at }} </div>
                <div class="text-right font-weight-bold mr-2"> {{ $list->karyawan->first_name }} {{ $list->karyawan->last_name }} </div>
                <img class="img-profile rounded-circle " src="{{ asset('img/undraw_profile.svg ') }} " style="width: 30px;">


            </div>
            <div class="d-flex justify-content-end">
                {{ $list->message }}
            </div>

        </div>
    </div>

    @endif

    @endforeach

        
        <label for="exampleFormControlInput1" class="mt-5">Balas</label>
        <div class="input-group  ">
            
            <input type="hidden" class="form-control" id="nik" placeholder="Masukkan judul pelatihan" name="nik" value="{{ $user->nik }}" required>
            <input type="hidden" class="form-control" id="to_nik" placeholder="Masukkan judul pelatihan" name="to_nik" value="{{ $to_nik }}" required>
            <input type="text" class="form-control" id="message" placeholder="Masukkan pesan" name="message" required>
            <div class="input-group-append">
                
                <button id="btnsend" class="btn btn-primary"> <i class="bi bi-send"></i></button>
            </div>
        </div>
        
</div>


@endsection

@section('jsCustom')

<script>
    $('#btnsend').click(function(e) {

        e.preventDefault();
        var message = $("#message").val();
        var nik = $("#nik").val();
        var to_nik = $("#to_nik").val();



            console.log(message);
            console.log(nik);
            console.log(to_nik);

            let token   = $("meta[name='csrf-token']").attr("content");
        

            var params = {
                'nik': nik,
                'to_nik' : to_nik,
                'message': message,
                "_token": token
            }

            $.ajax({
                type:'POST',
                url: '{{ route("send-messages") }}',
                data: params,
                success: function () {
                    window.location.reload()
                }



            });
        


    });
</script>

@endsection
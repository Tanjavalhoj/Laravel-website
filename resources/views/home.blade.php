@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 24px; color: #005584;">Kulsbjerg Skolen</div>

                <div class="card-body row" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="col-sm-3" style="text-align: center;">
                            <a href="rapportSick"><img src="{{ asset('image/teacher.png') }}" style="height: 100px; width: 140px;">Se alle vikare</a>
                        </div>
                        <div class="col-sm-3" style="text-align: center;">
                            <a href="rapportSick"><img src="{{ asset('image/calendar.png') }}" style="height: 100px; width: 140px;">Se skema</a>
                        </div>
                        <div class="col-sm-3" style="text-align: center;">
                            <a href="rapportSick"><img src="{{ asset('image/student.jpg') }}" style="height: 100px; width: 140px;">Se elever</a>
                        </div>
                        <div class="col-sm-3" style="text-align: center;">
                            <a href="rapportSick"><img src="{{ asset('image/sygdom.jpg') }}" style="height: 100px; width: 140px;">Meld dig syg</a>
                        </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

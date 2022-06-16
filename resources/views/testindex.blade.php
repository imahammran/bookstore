@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>API Book List </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
</div>



<div class="container-fluid mb-5" style="margin-bottom: 150px !important">
    <div class="row mr-4">
        @foreach ($responseBody as $response)

        <div class="col-xl-3 col-md-6 mb-4 hvr-grow ">
            <div class="card shadow  py-0 rounded-lg ">
                <div class="card-body py-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                                <div class=" font-weight-bold mb-2 mt-2 text-primary text-center text-uppercase mb-1">
                                    {{ Str::limit($response->name, 45) }}

                                </div>
                            </a>
                            <div class="h6 mb-0 text-gray-800 text-center text-uppercase">
                                {{ Str::limit($response->type, 545) }}
                            </div>
                            <div class="h6 mb-0 text-gray-800 text-center text">
                                @if ($response->available)
                                <h6>Available</h6>
                                @else
                                <h6>Not Available</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="position: absolute; bottom: 0" class="mb-2">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
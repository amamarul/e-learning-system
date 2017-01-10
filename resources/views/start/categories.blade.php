@extends('shell')

@section('content')

<div class="container">
    <div class="categories">
        <div class="col-sm-4">
            <a href="{{ url('/categorien/gedragsstoornissen') }}" class="panel panel-default panel-sapphire">
                <div class="panel-body">
                    <span>Gedragsstoornissen</span>
                </div>
            </a>
            </a>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default panel-green">
                <div class="panel-body">
                    Kinderen- en jeugd algemeen
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default panel-orange">
                <div class="panel-body">
                    Veiligheid
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

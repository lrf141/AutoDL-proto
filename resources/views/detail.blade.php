@extends('layouts.app')

@section('content')
    <div id="xid" data-xid="{{$meta->xid}}"></div>
    <div class="container-fluid" style="min-height: 100%;">
        <div class="row justify-content-around">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Result Details {{ $meta->xid }} {{ $meta->created_at }}</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
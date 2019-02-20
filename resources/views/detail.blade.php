@extends('layouts.app')

@section('content')
    <div id="xid" data-xid="{{$meta->xid}}"></div>
    <div class="container-fluid" style="min-height: 100%;">
        <div class="row justify-content-around">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Result Details {{ $meta->xid }} {{ $meta->created_at }}</div>
                    <div class="card-body">
                        <div class="card-title">Source Code</div>
                        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
                        <pre><code id="code" class="prettyprint">{{ $detail->code }}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
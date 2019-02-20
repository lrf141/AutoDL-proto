@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Results</div>

                    <div class="card-body">
                        <div class="card-columns">
                            <div class="card-title">xid</div>
                            <div class="card-text">description</div>
                            <div class="card-text">date</div>
                        </div>
                        @foreach($results as $result)
                            <div class="card-columns">
                                <div class="card-text">
                                    <a href="{{ url('/result/'.$result->xid) }}}">{{ $result->xid }}</a>
                                </div>
                                <div class="card-text">
                                    {{ $result->desc }}
                                </div>
                                <div class="card-text">
                                    {{ $result->created_at }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

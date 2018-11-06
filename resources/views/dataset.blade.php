@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Datasets</div>

                    <div class="card-body">
                        @foreach($data as $item)
                            <div class="card-columns">
                                <div class="card-title">
                                    <a href="{{ url('/dataset/'.$item->name) }}}">{{ $item->name }}</a>
                                </div>
                                <div class="card-text">
                                    {{ $item->desc }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

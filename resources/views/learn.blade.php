@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Learn</div>

                    <div class="card-body">
                        <form action="{{ url('/learn/submit') }}" method="post">
                            {{ csrf_field() }}
                            <div class="card-columns">
                                <div class="card-text">
                                    Select Datasets:
                                    <select id="dataset" name="dataset">
                                        @foreach($data as $item)
                                            <option value="{{ $item->name }}" id="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <textarea id="coding" name="coding" style="height: 400px;width: 100%;"></textarea>
                            <div class="card-group">
                                <input type="submit" class="btn-light" value="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import Codearea from "../assets/js/components/codearea";
    export default {
        components: {Codearea}
    }
</script>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Learn</div>

                    <div class="card-body">
                        <div class="card-columns">
                            <div class="card-text">
                                Select Datasets:
                                <select id="dataset">
                                    @foreach($data as $item)
                                        <option value="{{ $item->name }}" id="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <code-area></code-area>
                        <div class="card-group">
                            <input type="submit" class="btn-light" value="submit"/>
                        </div>
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
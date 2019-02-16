@extends('layouts.app')

@section('content')
    <div class="container-fluid">
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
                            <div id="editor" style="height: 600px;width: 100%;">
                            </div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ext-language_tools.js"></script>
                            <script>
                                let editor = ace.edit("editor");
                                editor.setOptions({
                                    enableBasicAutocompletion: true,
                                    enableSnippets: true,
                                    enableLiveAutocompletion: true
                                });
                                editor.setFontSize(14);
                                editor.getSession().setMode("ace/mode/python");
                                editor.getSession().setUseWrapMode(false);

                                editor.on("change", (obj) => {
                                   document.getElementById('coding').value = editor.getSession().getValue();
                                });
                            </script>
                            <textarea id="coding" name="coding" hidden></textarea>
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

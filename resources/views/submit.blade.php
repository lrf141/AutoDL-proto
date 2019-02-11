@extends('layouts.app')



@section('content')
    <!-- ここあとでcdnからyarnに変更する -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script type="text/javascript">
        const socket = io();
        const chName = document.getElementById('xid').dataset.xid;
        socket.on(chName, (msg) => {
            document.getElementById('process-box').insertAdjacentElement('afterbegin', "<p>"+msg+"</p>");
        });
    </script>
    <div id="xid" data-xid="{{$xid}}"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit</div>
                    <div class="card-body" id="process-box">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
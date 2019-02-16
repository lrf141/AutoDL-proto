@extends('layouts.app')



@section('content')
    <div id="xid" data-xid="{{$xid}}"></div>
    <div class="container-fluid" style="min-height: 100%;">
        <div class="row justify-content-around">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit</div>
                    <div class="card-body">
                        <textarea id="process-box" rows="25" style="overflow: scroll;width: 100%;"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ここあとでcdnからyarnに変更する -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script type="text/javascript">
        //ws -> wss
        //using local setting
        const socket = io('ws://172.30.0.1:8000');
        const chName = document.getElementById('xid').dataset.xid;
        socket.emit('register', {xid: chName});
        socket.on('process-message', (msg) => {
            console.log(msg);
            document.getElementById('process-box').value += msg.body + '\n';
        });
    </script>
@endsection

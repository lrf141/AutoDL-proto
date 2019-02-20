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

                        <div class="card-title">Graph</div>
                        <canvas id="mychart"></canvas>
                        <div id="loss" hidden>{{ $value->loss }}</div>
                        <div id="val_loss" hidden>{{ $value->val_loss }}</div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
                        <script>
                            let loss = document.getElementById('loss').innerHTML;
                            loss = loss.slice(1, -1).split(',');
                            let val_loss = document.getElementById('val_loss').innerHTML;
                            val_loss = val_loss.slice(1, -1).split(',');
                            let len = [];
                            for (let i = 0; i < loss.length; i++) {
                                len.push(i);
                            }
                            const ctx = document.getElementById("mychart").getContext('2d');
                            const myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: len,
                                    datasets: [{
                                        label: 'loss',
                                        data: loss,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                        ],
                                        borderWidth: 1
                                    },
                                        {
                                            label: 'val_loss',
                                            data: val_loss,
                                            backgroundColor: [
                                                'rgba(54, 162, 235, 0.2)',
                                            ],
                                            borderColor: [
                                                'rgba(54, 162, 235, 1)',
                                            ],
                                            borderWidth: 1
                                        }]
                                },
                                options: {
                                    responsive: true,
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
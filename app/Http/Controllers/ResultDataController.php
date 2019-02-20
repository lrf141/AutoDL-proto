<?php

namespace App\Http\Controllers;

use App\Models\ResultModel;
use http\Exception\UnexpectedValueException;
use Illuminate\Http\Request;

class ResultDataController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has('xid')) {
            throw new UnexpectedValueException('need xid');
        }

        if (!$request->has('loss') || !$request->has('val_loss')) {
            return response()->json(['status' => 'no data add']);
        }

        $xid = $request->input('xid');
        $loss = $request->input('loss');
        $val_loss = $request->input('val_loss');

        $array = [
            'xid' => $xid,
            'loss' => $loss,
            'val_loss' => $val_loss,
        ];

        $json = json_encode($array);

        ResultModel::setResultValues($xid, $json);

        return response()->json(['status' => 'result meta data add']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

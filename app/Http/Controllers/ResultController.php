<?php
/**
 * Created by PhpStorm.
 * User: lrf141
 * Date: 19/02/20
 * Time: 3:24
 */

namespace App\Http\Controllers;

use App\Models\ResultModel;
use GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public $timestamp = true;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = ResultModel::getResultByUserId(Auth::user()->id);
        return view('result', ['results' => $result]);
    }

    public function detail($xid)
    {
        $xid = substr($xid, 0, -1);
        $meta = ResultModel::getResultByTransactionId($xid);
        if ($meta === null) {
            return view('welcome');
        }

        $detail = ResultModel::getResultDetails($xid);

        return view('detail', ['meta' => $meta, 'detail' => $detail]);
    }
}

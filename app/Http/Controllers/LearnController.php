<?php
/**
 * Created by PhpStorm.
 * User: lrf141
 * Date: 18/11/06
 * Time: 11:31
 */

namespace App\Http\Controllers;

use App\Models\DatasetModel;
use GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Zjango\Laracurl\Facades\Laracurl;

class LearnController extends Controller
{

    /** @var array  */
    private $datasets = ['iris'];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('learn', ['data'=>DatasetModel::getAllDatasetNames()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function submit(Request $request)
    {
        // transaction id
        $xid = (string)microtime();

        $type = $request->dataset;
        $code = $request->coding;

        if (is_null($code) || array_search($type, $this->datasets)) {
            throw new \UnexpectedValueException('unexpected http request');
        }

        $path = 'add';

        $client = new \GuzzleHttp\Client([
            'base_uri' => 'http://172.30.0.1:9001/',
        ]);

        $response = $client->request('POST', $path, ['json' => ['xid' => $xid, 'code' => $code]]);
        error_log($response->getBody());
        if ($response->getStatusCode() != 200) {
            //add error handler
            return;
        }

        return view('submit', ['xid' => $xid]);
        //return redirect()->route('learn-result', ['xid' => $xid]);
    }

    public function result(Request $request)
    {
        $xid = $request->input('xid');
        return view('submit', ['xid' => $xid]);
    }
}

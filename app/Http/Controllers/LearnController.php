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

class LearnController extends Controller
{

    /** @var array  */
    private $datasets = [ 'iris' ];

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
        return view('learn', [ 'data'=>DatasetModel::getAllDatasetNames() ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {

        if (!$request->has('coding') || !$request->has('dataset')) {
            throw new \UnexpectedValueException('unexpected http request');
        }

        if (!in_array($request->dataset, $this->datasets)) {
            throw new \UnexpectedValueException('unexpected http request');
        }

        // transaction id
        $xid = (string) time();

        $code = $request->coding;

        $path = 'add';

        $client = new \GuzzleHttp\Client([
            'base_uri' => 'http://172.30.0.1:9001/',
        ]);

        $response = $client->request('POST', $path, [ 'json' => [ 'xid' => $xid, 'code' => $code ] ]);
        if ($response->getStatusCode() != 200) {
            throw new \UnexpectedValueException('unexpected http response: ');
        }
        return redirect()->route('learn-result', [ 'xid' => $xid ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function result(Request $request)
    {
        $xid = $request->input('xid');
        return view('submit', [ 'xid' => $xid ]);
    }
}

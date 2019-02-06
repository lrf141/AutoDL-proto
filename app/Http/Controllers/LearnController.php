<?php
/**
 * Created by PhpStorm.
 * User: lrf141
 * Date: 18/11/06
 * Time: 11:31
 */

namespace App\Http\Controllers;

use App\Models\DatasetModel;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $xid = str(microtime());

        $type = $request->dataset;
        $code = $request->coding;

        if (is_null($code) || array_search($type, $this->datasets)) {
            throw new \UnexpectedValueException('unexpected http request');
        }

        $client = new \GuzzleHttp\Client([
            'base_uri' => env(GPU_URL, 'http://localhost:9000')
        ]);

        $path = '/add';

        $response = $client->request('POST', $path, ['json' => ['xid' => $xid, 'code' => $code]]);

        if ($response->getStatusCode() != 200) {
            //add error handler
            return;
        }

        return view('submit', ['xid' => $xid]);
    }
}

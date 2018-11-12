<?php
/**
 * Created by PhpStorm.
 * User: lrf141
 * Date: 18/11/06
 * Time: 11:31
 */

namespace App\Http\Controllers;

use App\Models\DatasetModel;
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
    public function send(Request $request)
    {
        $type = $request->dataset;
        $code = $request->coding;

        if (is_null($code) || array_search($type, $this->datasets)) {
            throw new \UnexpectedValueException('unexpected http request');
        }
        return view('submit', ['type' => $type, 'code' => $code]);
    }
}

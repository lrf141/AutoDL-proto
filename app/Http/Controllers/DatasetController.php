<?php
/**
 * Created by PhpStorm.
 * User: lrf141
 * Date: 18/11/05
 * Time: 23:19
 */

namespace App\Http\Controllers;

use App\Models\ListsModel;
use Illuminate\Http\Request;

class DatasetController extends Controller
{

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
     * Show the application dashboard.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('dataset', ['data' => ListsModel::getAllLists()]);
    }
}

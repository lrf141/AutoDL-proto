<?php
/**
 * Created by PhpStorm.
 * User: lrf141
 * Date: 18/11/05
 * Time: 23:19
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatasetModel;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dataset', ['data'=>DatasetModel::getByName('iris')]);
    }
}

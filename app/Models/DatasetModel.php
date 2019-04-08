<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatasetModel extends Model
{
    protected $table = 'datasets';

    /**
     * @param string $name
     * @return array
     */
    public static function getByName(string $name) : array
    {
        return DB::select('select * from datasets where `name` = ?', [$name]);
    }

    /**
     * @return array
     */
    public static function getAllDatasets() : array
    {
        return DB::select('select * from datasets');
    }

    /**
     * @return array
     */
    public static function getAllDatasetNames() : array
    {
        return DB::select('select `name` from datasets');
    }
}

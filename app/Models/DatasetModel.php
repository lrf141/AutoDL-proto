<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatasetModel extends Model
{

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
}

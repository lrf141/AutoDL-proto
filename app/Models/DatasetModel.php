<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatasetModel extends Model
{
    public static function getByName(string $name)
    {
        return DB::select('select * from datasets where `name` = ?', [$name]);
    }

}

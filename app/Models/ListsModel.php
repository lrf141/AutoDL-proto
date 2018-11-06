<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ListsModel extends Model
{
    /**
     * @return array
     */
    public static function getAllLists() : array
    {
        return DB::select('select * from lists');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ResultModel extends Model
{

    /**
     * @param int $user_id
     * @param string $xid
     * @param string $desc
     */
    public static function insertInfo(int $user_id, string $xid, string $desc)
    {
        DB::table('result')->insert(
            ['userid' => $user_id, 'xid' => $xid, 'desc' => $desc]
        );
    }

    /**
     * @param int $user_id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getResultByUserId(int $user_id)
    {
        return DB::table('result')->where('userid', '=', $user_id)->paginate(15);
    }

    /**
     * @param string $xid
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public static function getResultByTransactionId(string $xid)
    {
        return DB::table('result')->where('xid', 'like', $xid.'%')->first();
    }

}

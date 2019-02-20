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

    /**
     * @param array $result
     * @param string $xid
     */
    public static function setResultDetails(array $result)
    {
        $s3 = new \Aws\S3\S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'endpoint' => 'http://172.30.0.1:9000',
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => 'minio_access_key',
                'secret' => 'minio_secret_key',
            ],
        ]);

        $s3->putObject([
            'Bucket' => 'gambit',
            'Key' => $result['xid'].'.json',
            'Body' => json_encode($result),
        ]);
    }

    /**
     * @param string $xid
     * @return mixed
     */
    public static function getResultDetails(string $xid)
    {
        $s3 = new \Aws\S3\S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'endpoint' => 'http://172.30.0.1:9000',
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => 'minio_access_key',
                'secret' => 'minio_secret_key',
            ],
        ]);

        $result = $s3->getObject([
            'Bucket' => 'gambit',
            'Key' => $xid.'.json'
        ]);

        return json_decode($result['Body']);
    }


    /**
     * @param string $xid
     * @param string $metas
     */
    public static function setResultValues(string $xid, string $metas)
    {
        DB::table('value')->insert([
            'xid' => $xid,
            'meta' => $metas
        ]);
    }

    /**
     * @param string $xid
     * @return \Illuminate\Database\Query\Builder
     */
    public static function getResultValuesByXid(string $xid)
    {
        return DB::table('value')->where('xid', 'list', $xid.'%');
    }
}

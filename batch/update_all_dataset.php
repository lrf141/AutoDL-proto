<?php
/**
 * Created by PhpStorm.
 * User: lrf141
 * Date: 18/11/05
 * Time: 22:22
 */

require_once '../vendor/autoload.php';

use Illuminate\Support\Facades\DB;
use Aws\S3\S3Client;

$s3Client = new S3Client([
    'credentials' => [
        'key' => env('S3_ACCESSKEY'),
        'secret' => env('S3_SECRETKEY'),
    ],
    'region' => env('S3_REGION'),
    'version' => 'latest',
]);

$result = $s3Client->getObject([
    'Bucket' => env('S3_BUCKET'),
    'Key' => env('S3_ARMKEY'),
]);

echo $result;
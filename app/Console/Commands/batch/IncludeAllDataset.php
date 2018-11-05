<?php

namespace App\Console\Commands\batch;

use Aws\S3\Exception\S3Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Aws\S3\S3Client;


class IncludeAllDataset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:dataset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'S3にあるデータ・セットをDBに追加する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $s3Client = new S3Client([
            'credentials' => [
                'key' => env('S3_ACCESSKEY'),
                'secret' => env('S3_SECRETKEY'),
            ],
            'region' => env('S3_REGION'),
            'version' => 'latest',
        ]);

        try{

            $result = $s3Client->getObject([
                'Bucket' => env('S3_BUCKET'),
                'Key' => 'iris.json',
            ]);

            $json = json_decode($result['Body']);

            DB::insert('insert into lists (`name`, `desc`, created_at, updated_at) values (?, ?, now(), now());', [$json->name, 'Irisのデータ・セット']);
            DB::insert('insert into datasets (`name`, json, created_at, updated_at) values (?, ?, now(), now());', [$json->name, trim($result['Body'])]);

        }catch (S3Exception $e){
            echo $e->getMessage();
        }

    }
}

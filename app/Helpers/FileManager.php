<?php
/**
 * Created by PhpStorm.
 * User: aamiriqbal
 * Date: 11/26/20
 * Time: 12:37 AM
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileManager
{

    public static function upload($file, $type)
    {
        $file_name = md5(microtime()).".".$file->getClientOriginalExtension();
        $path = $type.'/'.$file_name;
        $contents = file_get_contents($file->getRealPath());

        Storage::cloud()->put($path, $contents, 'public');

        //Storage::disk('minio')->put($path, $contents);

        return Storage::disk('minio')->url($path);

    }

    public static function deletFile($path)
    {
        return Storage::disk('minio')->delete($path);

    }
}
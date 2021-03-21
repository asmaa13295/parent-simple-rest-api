<?php

namespace App\Services;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

/**
 * Class LoadData
 * @package App\Services
 */
class ReadData
{
    /**
     * @return array
     */
    public static function readDataFromLocalDisc()
    {
        $loadedData = [];
        // get just json files name from the local disk directory
        $jsonFiles = array_filter(
            Storage::disk('local')->allFiles(),
            function ($item) {
                return strpos($item, '.json');
            }
        );

        $fileContentsArrays =[];
            foreach($jsonFiles as $jsonFile) {
                // read the content of each json file
                try {
                    $fileContentsArrays = json_decode(Storage::disk('local')->get($jsonFile), true);
                } catch (FileNotFoundException $exception) {
                    abort(404,'File not found');
                }
                // map each file data to it's corresponding mapper
                if($fileContentsArrays && count($fileContentsArrays) > 0) {
                    $fileData = MapFileToHydrator::mapFile($fileContentsArrays, pathinfo($jsonFile)['filename']);
                    $loadedData = array_merge($loadedData, $fileData);
                }
            }
        return ['filesNames' => $jsonFiles, 'data' => $loadedData];
    }
}

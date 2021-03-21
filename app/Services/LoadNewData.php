<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

/**
 * Class LoadNewData
 * @package App\Services
 */
class LoadNewData
{
    /**
     * load json file data from the local storage
     */
    public static function loadDataToDatabase()
    {
        $localDiskDataObjects = ReadData::readDataFromLocalDisc();
        foreach ($localDiskDataObjects['data'] as $object)
        {
            $object->save();
        }
        // delete the loaded local disc files to avoid data duplication in each read
        foreach($localDiskDataObjects['filesNames'] as $jsonFile) {
            json_decode(Storage::disk('local')->delete($jsonFile), true);
        }
    }
}

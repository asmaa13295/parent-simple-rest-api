<?php

namespace App\Services;

/**
 * Class MapFileToHydrator
 * @package App\Services
 */
class MapFileToHydrator
{
    /**
     * convert data to our parent user object depend on it's type
     * @param array $fileContentsArrays
     * @param string $jsonFileName
     * @return array
     */
    public static function mapFile(array $fileContentsArrays, string $jsonFileName)
    {
        $mappedObjects = [];
        foreach($fileContentsArrays as $content) {
            // choosing the mapper depend on the provider file name
            if ($jsonFileName == 'DataProviderX') {
                $hydratedObject = HydrateDataX::mapArray($content);
                array_push($mappedObjects, $hydratedObject);
            }
            else if ($jsonFileName == 'DataProviderY') {
                $hydratedObject = HydrateDataY::mapArray($content);
                array_push($mappedObjects, $hydratedObject);
            } else {
                throw new \InvalidArgumentException("Your file doesn't match any of the recognized files.");
            }
        }
        return $mappedObjects;
    }
}

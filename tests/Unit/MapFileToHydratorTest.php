<?php

namespace Tests\Unit;

use App\Services\MapFileToHydrator;
use PHPUnit\Framework\TestCase;

/**
 * Class MapFileToHydratorTest
 * @package Tests\Unit
 */
class MapFileToHydratorTest extends TestCase
{

    public function test_map_file_receives_empty_array_returns_empty_array()
    {
        $mapFileService = new MapFileToHydrator();
        $result = $mapFileService->mapFile([], 'DataProviderY');
        $this->assertEmpty($result);
    }

    public function test_map_file_receives_undefined_file_name_returns_invalid_argument_exception()
    {
        $fileName = 'otherDataProvider';
        $fileContentsArrays = [
            "parentAmount" => 200,
            "Currency" =>"USD",
            "parentEmail"=>"parent1@parent.eu",
            "statusCode"=>1,
            "registrationDate"=> "2018-11-30",
            "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
        ];
        $mapFileService = new MapFileToHydrator();
        $this->expectException(\InvalidArgumentException::class);
        $mapFileService->mapFile([$fileContentsArrays], $fileName);
    }

    public function test_map_file_receives_data_from_provider_x_file_returns_array()
    {
        $fileName = 'DataProviderX';
        $fileContentsArrays = [
            "parentAmount" => 200,
            "Currency" =>"USD",
            "parentEmail"=>"parent1@parent.eu",
            "statusCode"=>1,
            "registrationDate"=> "2018-11-30",
            "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
        ];
        $mapFileService = new MapFileToHydrator();
        $result = $mapFileService->mapFile([$fileContentsArrays], $fileName);
        $this->assertIsArray($result);
    }

    public function test_map_file_receives_data_from_provider_y_file_returns_array()
    {
        $fileName = 'DataProviderY';
        $fileContentsArrays = [
            "balance"=>300,
            "currency"=>"AED",
            "email"=>"parent2@parent.eu",
            "status"=>100,
            "created_at"=> "22/12/2018",
            "id"=> "4fc2-a8d1"
        ];
        $mapFileService = new MapFileToHydrator();
        $result = $mapFileService->mapFile([$fileContentsArrays], $fileName);
        $this->assertIsArray($result);
    }

}

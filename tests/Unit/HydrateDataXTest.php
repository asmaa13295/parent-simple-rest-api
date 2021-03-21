<?php

namespace Tests\Unit;

use App\Models\ParentUsers;
use App\Services\HydrateDataX;
use PHPUnit\Framework\TestCase;

class HydrateDataXTest extends TestCase
{

    public function test_map_array_to_object_without_id_key_throws_invalid_argument_exception()
    {
        $fileContentsArrays = [
            "parentAmount" => 200,
            "Currency" =>"USD",
            "parentEmail"=>"parent1@parent.eu",
            "statusCode"=>1,
            "registrationDate"=> "2018-11-30",
        ];
        $mapArrayToObjectService = new HydrateDataX();
        $this->expectException(\InvalidArgumentException::class);
        $mapArrayToObjectService->mapArray($fileContentsArrays);
    }

    public function test_map_array_to_object_without_amount_throws_invalid_argument_exception()
    {
        $fileContentsArrays = [
            "Currency" =>"USD",
            "parentEmail"=>"parent1@parent.eu",
            "statusCode"=>1,
            "registrationDate"=> "2018-11-30",
            "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
        ];
        $mapArrayToObjectService = new HydrateDataX();
        $this->expectException(\InvalidArgumentException::class);
        $mapArrayToObjectService->mapArray($fileContentsArrays);
    }

    public function test_map_array_to_object_without_email_throws_invalid_argument_exception()
    {
        $fileContentsArrays = [
            "parentAmount" => 200,
            "Currency" =>"USD",
            "statusCode"=>1,
            "registrationDate"=> "2018-11-30",
            "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
        ];
        $mapArrayToObjectService = new HydrateDataX();
        $this->expectException(\InvalidArgumentException::class);
        $mapArrayToObjectService->mapArray($fileContentsArrays);
    }

    public function test_map_array_to_object_without_status_throws_invalid_argument_exception()
    {
        $fileContentsArrays = [
            "parentAmount" => 200,
            "Currency" =>"USD",
            "parentEmail"=>"parent1@parent.eu",
            "registrationDate"=> "2018-11-30",
            "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
        ];
        $mapArrayToObjectService = new HydrateDataX();
        $this->expectException(\InvalidArgumentException::class);
        $mapArrayToObjectService->mapArray($fileContentsArrays);
    }

    public function test_map_array_to_object_without_currency_returns_object()
    {
        $fileContentsArrays = [
            "parentAmount" => 200,
            "parentEmail"=>"parent1@parent.eu",
            "statusCode"=>1,
            "registrationDate"=> "2018-11-30",
            "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
        ];
        $mapArrayToObjectService = new HydrateDataX();
        $result = $mapArrayToObjectService->mapArray($fileContentsArrays);
        $this->assertInstanceOf(ParentUsers::class, $result);
    }

    public function test_map_array_to_object_without_registration_date_returns_object()
    {
        $fileContentsArrays = [
            "parentAmount" => 200,
            "Currency" =>"USD",
            "parentEmail"=>"parent1@parent.eu",
            "statusCode"=>1,
            "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
        ];
        $mapArrayToObjectService = new HydrateDataX();
        $result = $mapArrayToObjectService->mapArray($fileContentsArrays);
        $this->assertInstanceOf(ParentUsers::class, $result);
    }

    public function test_map_array_to_object_with_all_data_returns_object()
    {
        $fileContentsArrays = [
            "parentAmount" => 200,
            "Currency" =>"USD",
            "parentEmail"=>"parent1@parent.eu",
            "statusCode"=>1,
            "registrationDate"=> "2018-11-30",
            "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
        ];
        $mapArrayToObjectService = new HydrateDataX();
        $result = $mapArrayToObjectService->mapArray($fileContentsArrays);
        $this->assertInstanceOf(ParentUsers::class, $result);
    }
}

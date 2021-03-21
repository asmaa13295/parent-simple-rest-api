<?php

namespace Tests\Unit;

use App\Models\ParentUsers;
use App\Services\HydrateDataY;
use PHPUnit\Framework\TestCase;

class HydrateDataYTest extends TestCase
{
    public function test_map_array_to_object_without_id_key_throws_invalid_argument_exception()
    {
        $fileContentsArrays = [
            "balance"=>300,
            "currency"=>"AED",
            "email"=>"parent2@parent.eu",
            "status"=>100,
            "created_at"=> "22/12/2018",
        ];
        $mapArrayToObjectService = new HydrateDataY();
        $this->expectException(\InvalidArgumentException::class);
        $mapArrayToObjectService->mapArray($fileContentsArrays);
    }

    public function test_map_array_to_object_without_amount_throws_invalid_argument_exception()
    {
        $fileContentsArrays = [
            "currency"=>"AED",
            "email"=>"parent2@parent.eu",
            "status"=>100,
            "created_at"=> "22/12/2018",
            "id"=> "4fc2-a8d1"
        ];
        $mapArrayToObjectService = new HydrateDataY();
        $this->expectException(\InvalidArgumentException::class);
        $mapArrayToObjectService->mapArray($fileContentsArrays);
    }

    public function test_map_array_to_object_without_email_throws_invalid_argument_exception()
    {
        $fileContentsArrays = [
            "balance"=>300,
            "currency"=>"AED",
            "status"=>100,
            "created_at"=> "22/12/2018",
            "id"=> "4fc2-a8d1"
        ];
        $mapArrayToObjectService = new HydrateDataY();
        $this->expectException(\InvalidArgumentException::class);
        $mapArrayToObjectService->mapArray($fileContentsArrays);
    }

    public function test_map_array_to_object_without_status_throws_invalid_argument_exception()
    {
        $fileContentsArrays = [
            "balance"=>300,
            "currency"=>"AED",
            "email"=>"parent2@parent.eu",
            "created_at"=> "22/12/2018",
            "id"=> "4fc2-a8d1"
        ];
        $mapArrayToObjectService = new HydrateDataY();
        $this->expectException(\InvalidArgumentException::class);
        $mapArrayToObjectService->mapArray($fileContentsArrays);
    }

    public function test_map_array_to_object_without_currency_returns_object()
    {
        $fileContentsArrays = [
            "balance"=>300,
            "email"=>"parent2@parent.eu",
            "status"=>100,
            "created_at"=> "22/12/2018",
            "id"=> "4fc2-a8d1"
        ];
        $mapArrayToObjectService = new HydrateDataY();
        $result = $mapArrayToObjectService->mapArray($fileContentsArrays);
        $this->assertInstanceOf(ParentUsers::class, $result);
    }

    public function test_map_array_to_object_without_registration_date_returns_object()
    {
        $fileContentsArrays = [
            "balance"=>300,
            "currency"=>"AED",
            "email"=>"parent2@parent.eu",
            "status"=>100,
            "id"=> "4fc2-a8d1"
        ];
        $mapArrayToObjectService = new HydrateDataY();
        $result = $mapArrayToObjectService->mapArray($fileContentsArrays);
        $this->assertInstanceOf(ParentUsers::class, $result);
    }

    public function test_map_array_to_object_with_all_data_returns_object()
    {
        $fileContentsArrays = [
            "balance"=>300,
            "currency"=>"AED",
            "email"=>"parent2@parent.eu",
            "status"=>100,
            "created_at"=> "22/12/2018",
            "id"=> "4fc2-a8d1"
        ];
        $mapArrayToObjectService = new HydrateDataY();
        $result = $mapArrayToObjectService->mapArray($fileContentsArrays);
        $this->assertInstanceOf(ParentUsers::class, $result);
    }
}

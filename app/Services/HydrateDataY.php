<?php

namespace App\Services;

use App\Models\ParentUsers;

/**
 * Class HydrateDataY
 * @package App\Services
 */
class HydrateDataY
{
    const STATUS_MAPPING_ARRAY =  [
            100 => 'authorised',
            200 => 'declined',
            300 => 'refunded'
        ];
    const DATA_SOURCE_Y = 'DataProviderY';

    /**
     * @param array $object
     * @return ParentUsers
     */
    public static function mapArray(array $object)
    {
        $parentObject = new ParentUsers();
        $parentObject->dataSource = HydrateDataY::DATA_SOURCE_Y;

        if(!empty($object['id'])) {
            $parentObject->identificationId = $object['id'];
        } else {
            throw new \InvalidArgumentException("should send user identification id");
        }
        if(!empty($object['balance'])) {
            $parentObject->balance = $object['balance'];
        } else {
            throw new \InvalidArgumentException("should send amount of money");
        }
        if(!empty($object['status'])) {
            $parentObject->status = HydrateDataX::STATUS_MAPPING_ARRAY[$object['status']];
        } else {
            throw new \InvalidArgumentException("should send status code");
        }
        if(!empty($object['email'])) {
            $parentObject->email = $object['email'];
        } else {
            throw new \InvalidArgumentException("should send user email");
        }
        if(!empty($object['currency'])) {
            $parentObject->currency = $object['currency'];
        }
        if(!empty($object['created_at'])) {
            $parentObject->joinedDate = date("y-m-d", strtotime($object['created_at']));
        }
        return $parentObject;
    }

}

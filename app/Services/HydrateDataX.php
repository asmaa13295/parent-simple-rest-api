<?php

namespace App\Services;

use App\Models\ParentUsers;

/**
 * Class HydrateDataX
 * @package App\Services
 */
class HydrateDataX
{
    const STATUS_MAPPING_ARRAY =  [
        1 => 'authorised',
        2 => 'declined',
        3 => 'refunded'
    ];
    const DATA_SOURCE_X = 'DataProviderX';

    /**
     * @param array $object
     * @return ParentUsers
     */
    public static function mapArray(array $object)
    {
        $parentObject = new ParentUsers();
        $parentObject->dataSource = HydrateDataX::DATA_SOURCE_X;
        if(!empty($object['parentIdentification'])) {
            $parentObject->identificationId = $object['parentIdentification'];
        } else {
            throw new \InvalidArgumentException("should send user identification id");
        }
        if(!empty($object['parentAmount'])) {
            $parentObject->balance = $object['parentAmount'];
        } else {
            throw new \InvalidArgumentException("should send amount of money");
        }
        if(!empty($object['statusCode'])) {
            $parentObject->status = HydrateDataX::STATUS_MAPPING_ARRAY[$object['statusCode']];
        } else {
            throw new \InvalidArgumentException("should send status code");
        }
        if(!empty($object['parentEmail'])) {
            $parentObject->email = $object['parentEmail'];
        } else {
            throw new \InvalidArgumentException("should send user email");
        }
        if(!empty($object['Currency'])) {
            $parentObject->currency = $object['Currency'];
        }
        if(!empty($object['registrationDate'])) {
            $parentObject->joinedDate = date("y-m-d", strtotime($object['registrationDate']));
        }
        return $parentObject;
    }
}

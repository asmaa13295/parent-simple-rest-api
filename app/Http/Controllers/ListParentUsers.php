<?php

namespace App\Http\Controllers;

use App\Models\ParentUsers;
use App\Services\LoadNewData;
use Illuminate\Http\Request;

/**
 * Class ManageData
 * @package App\Http\Controllers
 */
class ListParentUsers extends Controller
{
    const STATUS_MAPPING_ARRAY =  [
        1 => 'authorised',
        2 => 'declined',
        3 => 'refunded',
        100 => 'authorised',
        200 => 'declined',
        300 => 'refunded'
    ];

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getParentUsersData(Request $request)
    {
        LoadNewData::loadDataToDatabase();
        $criteria = [];
        $criteria['provider'] = $request->query('provider') ?? null;
        $criteria['balanceMin'] = $request->query('balanceMin') ?? null;
        $criteria['balanceMax'] = $request->query('balanceMax') ?? null;
        $criteria['currency'] = $request->query('currency') ?? null;
        $criteria['status'] = $request->query('statusCode') ? ListParentUsers::STATUS_MAPPING_ARRAY[$request->query('statusCode')] : null;
        $users = new ParentUsers();
        return $users->fetch($criteria);
    }

}

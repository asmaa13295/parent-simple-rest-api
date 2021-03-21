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
        $criteria['status'] = $request->query('status') ?? null;
        $users = new ParentUsers();
        return $users->fetch($criteria);
    }

}

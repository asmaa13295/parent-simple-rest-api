<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ParentUsers
 * @package App\Models
 */
class ParentUsers extends Model
{
    use HasFactory;
    public $table = "parent_users";

    /**
     * @param array $criteria
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function fetch(array $criteria = [])
    {
        $query = ParentUsers::query();
        if ($criteria['provider']) {
            $query->where('dataSource', '=', $criteria['provider']);
        }
        if($criteria['balanceMin'] && $criteria['balanceMax']) {
            $query->whereBetween('balance', [$criteria['balanceMin'], $criteria['balanceMax']]);
        }
        if($criteria['currency']) {
            $query->where('currency', '=', $criteria['currency']);
        }
        if($criteria['status']) {
            $query->where('status', '=', $criteria['status']);
        }
        return $query->get();
    }
}

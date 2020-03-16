<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    protected $table = 'treasuries';
    public static function getTreasuryList($query, $sort_by, $sort_type)
    {
        return DB::table('treasuries')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('cashFlow', 'like', '%' . $query . '%')
            ->orWhere('type', 'like', '%' . $query . '%')
            ->orWhere('value', 'like', '%' . $query . '%')
            ->orWhere('date', 'like', '%' . $query . '%')
            ->orWhere('purpose', 'like', '%' . $query . '%')
            ->orWhere('note', 'like', '%' . $query . '%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
    }
}

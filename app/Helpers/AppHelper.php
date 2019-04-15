<?php

namespace App\Helpers;

use \Illuminate\Pagination\LengthAwarePaginator;
use \Illuminate\Support\Facades\Auth;

/**
* 
*/
class AppHelper
{
	public function numberPagination($key, $paginate, $data) {
        return ($paginate * ($data->currentPage() - 1)) + $key;
    }

    public function pagination($data, $paginate) {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentResults = $data->unique()->slice(($currentPage - 1) * $paginate, $paginate)->all();
        $results = new LengthAwarePaginator($currentResults, $data->unique()->count(), $paginate);
        return $results;
    }

    public static function instance() {
    	return new AppHelper();
    }
}
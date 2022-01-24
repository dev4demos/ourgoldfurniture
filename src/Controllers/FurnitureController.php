<?php

declare (strict_types = 1);

namespace Ourgold\Furniture\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Ourgold\Furniture\Models\FurnitureModel;

class FurnitureController extends Controller
{
    public function index(): JsonResponse
    {
        $pager = FurnitureModel::history(Request::input())->latest()->simplePaginate(Request::input('limit', 10));
        //
        return response()->json($pager->toArray());
    }
}

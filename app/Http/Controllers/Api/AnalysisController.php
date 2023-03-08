<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    // php artisan make:controller Api/AnalysisController でこのファイルを作成(API用)
    // routes/api.phpに追加
    // Ajaxで情報取得

    public function index(Request $request)
    {
        $subQuery = Order::betweenDate($request->startDate, $request->endDate);

        if ($request->type === "perDay") {
            $subQuery
                ->where("status", true)
                ->groupBy("id")
                ->selectRaw(
                    'SUM(subtotal) AS totalPrePurchase,
                    DATE_FORMAT(created_at, "%Y%m%d") AS date'
                )
                ->groupBy("date");

            $data = DB::table($subQuery)
                ->groupBy("date")
                ->selectRaw("date, sum(totalPerPurchase) as total")
                ->get();

            $labels = $data->pluck("date");
            $totals = $data->pluck("total");
        }
        return response()->json(
            [
                "data" => $data,
                "type" => $request->type,
                "labels" => $labels,
                "totals" => $totals,
            ],
            Response::HTTP_OK
        );
    }
}

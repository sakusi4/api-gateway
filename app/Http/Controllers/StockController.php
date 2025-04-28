<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::select('ticker')->get();

        return response()->json([
            'data' => $stocks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ticker' => 'required|string',
            'last_close_price' => 'required|numeric',
            'dividend_yield' => 'nullable|numeric',
        ]);

        $params = $request->all();
        Log::info(__METHOD__, [$params]);

        try {
            Stock::updateOrCreate(
                [
                    'ticker' => $params['ticker']
                ],
                [
                    'last_close_price' => $params['last_close_price'],
                    'dividend_yield' => $params['dividend_yield'],
                ]
            );

            return response()->json([
                'result' => 'success',
            ], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([
                'result' => 'failed'
            ], 500);
        }
    }

    public function detail(Request $request)
    {
        $request->validate([
            'ticker' => 'required|string',
        ]);

        $tickers = array_filter(array_map('trim', explode(',', strtoupper($request->input('ticker')))));
        $stocks = Stock::whereIn('ticker', $tickers)
            ->get(['ticker', 'last_close_price', 'dividend_yield']);

        return response()->json([
            'data' => $stocks,
        ]);
    }
}

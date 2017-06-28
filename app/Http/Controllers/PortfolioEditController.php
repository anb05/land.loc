<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request)
    {
//        echo "<h1>PORTFOLIO</h1>";
//        dump($portfolio);
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
        echo "<h1>REQUEST</h1>";
        dump($request);
        }

        $old = $portfolio->toArray();

        if (view()->exists('admin.portfolio_edit')) {
            $data = [
                'title' => 'Редактирование портфолио - ' . $old['name'],
                'data'  => $old,
            ];
            return view('admin.portfolio_edit', $data);
        }
        abort(404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function execute($alias)
    {
        if (!$alias) {
            abort(404);
        }

        if (view()->exists('site.page')) {
            /**
             * запрашиваем из БД информацию о модели Page с псевдонимом
             * хранящимся в переменной $alias, те
             * where `alias` == $alias;
             * Т.к. нужна только одна запись берём первую используя метод first();
             */
            $page = Page::where('alias', strip_tags($alias))->first();

            /**
             * Формируем массив данный для передачи в вид для отображения
             */
            $data = [
                'title' => $page->name,
                'page'  => $page,
            ];
            return view('site.page', $data);
        }
        else {
            abort(404);
        }
    }
}

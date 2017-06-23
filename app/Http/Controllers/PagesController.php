<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Метод предназначен для отображения всех добавленных страниц
     */
    public function execute()
    {
        if (view()->exists('admin.pages')) {
            $pages = Page::all();

            $data = [
                'title' => 'Страницы',
                'pages' => $pages,
            ];

            return view('admin.pages', $data);
        }

        abort(404);
    }
}

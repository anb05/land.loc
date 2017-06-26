<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Service;
use App\Portfolio;
use App\People;
use App\Mail\MailFromUser;

use DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $messages = [
            'required' => "Поле :attribute обязательно к заполнению",
            'email'    => "Поле :attribute должно соответствовать email адресу",
        ];

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'text'  => 'required',
            ],
                $messages);

            $data = $request->all();

            $mail = new MailFromUser($data);
            $mail_admin = env('MAIL_ADMIN');
            $mail->subject('Question');
            $mail->to($mail_admin);
//            Mail::to($mail_admin)->send($mail);
            try {
                Mail::send($mail);
                return redirect()->route('home')->with('status', 'Email is send');
            } catch (\Swift_SwiftException $exception) {
//                dd($exception);
                return redirect()->route('home')->with('status', $exception->getMessage());
            }

        }


        $pages = Page::all();

        $menu = [];

        foreach ($pages as $page) {
            $item = ['title' => $page->name, 'alias' => $page->alias];
            $menu[] = $item;
        }

        $item = ['title' => 'Services', 'alias' => 'service'];
        $menu[] = $item;

        $item = ['title' => 'Portfolio', 'alias' => 'Portfolio'];
        $menu[] = $item;

        $item = ['title' => 'Team', 'alias' => 'team'];
        $menu[] = $item;

        $item = ['title' => 'Contact', 'alias' => 'contact'];
        $menu[] = $item;

        $tags = DB::table('portfolios')->distinct()->pluck('filter');


        $portfolios = Portfolio::get(['name', 'filter', 'images']);

        $people = People::take(3)->get();

        $service = Service::where('id', '<', 20)->get();
//        dd($tags);
        return view('site.index',
            [
                'menu'       => $menu,
                'pages'      => $pages,
                'services'   => $service,
                'portfolios' => $portfolios,
                'people'     => $people,
                'tags'       => $tags,
            ]);
    }
}

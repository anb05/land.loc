<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesAddController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            $massages = [
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique'   => 'Поле :attribute должно быть уникальным',
            ];

            $validator = \Validator::make($input, [
                'name' => 'required|max:255',
                'text' => 'required',
                'icon' => 'required',
            ], $massages);

            if ($validator->fails()) {
                return redirect()
                    ->route('servicesAdd')
                    ->withErrors($validator)
                    ->withInput();
            }

            $service = new Service();
            $service->fill($input);

            if ($service->save()) {
                return redirect('admin')->with('status', 'Сервис добавлен');
            }
        }
        if (view()->exists('admin.service_add')) {
            $icons = array_unique(Service::pluck('icon')
                ->toArray());
//             dump($icons);
            $data = [
                'title' => 'Новый сервис',
                'icons' => $icons,
            ];
            return view('admin.service_add', $data);
        }
        abort(404);
    }
}

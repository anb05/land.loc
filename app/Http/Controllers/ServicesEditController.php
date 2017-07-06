<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesEditController extends Controller
{
    public function execute(Service $service, Request $request)
    {
        if ($request->isMethod('delete')) {
            $service->delete();
            return redirect('admin')->with('status', 'Сервис удалён');
        }

        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            $validator = \Validator::make($input, [
                'name' => 'required|max:255',
                'text' => 'required',
                'icon' => 'required|max:50',
            ]);

            if ($validator->fails()) {
                return redirect()->route('servicesEdit',
                    ['service'=> $input['id']])
                    ->withErrors($validator);
            }

            $service->fill($input);

            if ($service->update()) {
                return redirect('admin')->with('status', 'Сервис обновлён');
            }
        }

        $old = $service->toArray();
        if (view()->exists('admin.service_edit')) {
            $icons = array_unique(Service::pluck('icon')->toArray());
            $data = [
                'title' => 'Редактирование информации о сервисе - ' . $old['name'],
                'data'  => $old,
                'icons' => $icons,
            ];
            return view('admin.service_edit')
                ->with($data);
        }
        abort(404);
    }
}

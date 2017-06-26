<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request)
    {
        if ($request->isMethod('post')) {
            /**
             * Первым шагом извлекаем переданые от пользователя данные из
             * объекта $request
             */
            $input = $request->except('_token');

            /**
             * валидирум данные полученные от пользователя.
             * для этого используем фасад валидатора
             */
            $validator = \Validator::make($input, [
                'name'  => 'required|max:255',
                'alias' => 'required|max:255|unique:pages,alias,' . $input['id'],
                'text'  => 'required',
            ]);
            /**
             * Проверяем, прошли данные валидацию или нет.
             * метод fails() возвращает true в случае ошибки валидации.
             */
            if ($validator->fails()) {
                return redirect()->route('pagesEdit', ['page' => $input['id']])
                    ->withErrors($validator);
            }

            /**
             *
             */
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $file->move(public_path() . '/assets/img', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            } else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);
            $page->fill($input);

            if ($page->update()) {
                return redirect('admin')->with('status', 'Материал обновлен');
            }
//            dd($input);
        }
        /**
         * В аргументах функции внедряются зависимости Page и Request.
         * При этом параметры запроса из роутера передаются в функцию
         * и осуществляют выбор соответствующей модели (строки) из БД.
         * т.е. это эквивалентно записи строчкой ниже (при условии,
         * что $id будет первым в параметрах функции execute($id, Request $request)).
         * т.е. УЖЕ ИМЕЕМ ВЫБОРКУ ИЗ БД с соответствующим id в переменной $page
         */
//        $page = Page::find($id);
//        dd($page);

        /**
         * т.к. выборка из базы данных уже есть, то сформируем переменню $old.
         * Название выбрано таким, потому что в этой переменной будут храниться
         * устаревшие данные из БД, подлежащие редактированию.
         * Для формирования массива ТОЛЬКО данных из БД используем метод toArray()
         */
        $old = $page->toArray();

        if (view()->exists('admin.pages_edit')) {
            $data = [
                'title' => 'Редактирование страницы - ' . $old['name'],
                'data'  => $old,
            ];
            return view('admin.pages_edit', $data);
        }
//        dd($old);
    }
}

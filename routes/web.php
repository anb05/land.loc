<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    echo "<h1> Hello </h1>";
    return;
    return view('welcome');
});
*/

Route::group(['middleware'=>'web'], function ()
{
    Route::match(['get','post'], '/',
        ['uses' => 'IndexController@execute', 'as' => 'home']
    );

    Route::get('/page/{alias}',
        ['uses' => 'PageController@execute', 'as' => 'page']
    );

    /**
     * Формирование группы маршрутов для работы системы
     * аутентификации и авторизации фреймворка
     */
    Route::auth();
});

/**
 *  Группа маршрутов для работы закрытого раздела проекта.
 * Для панели администратора используется префикс admin, после чего идёт адрес странички,
 * например:
 * /admin/page
 * /admin/portfolio
 * /admin/service
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function ()
{
    /**
     * Отображение главной странички админки по адресу
     * /admin
     *
     * Отображаем ровно три ссылки.
     * Эти ссылки ведут на конкретный раздел панли администратора т.е.
     *    - раздел редактирования страниц;
     *    - раздел редактирования сервисов;
     *    - раздел редактирования портфорлио.
     */
    Route::get('/', function ()
    {
        if (view()->exists('admin.index')) {
            $data = [
                'title' => 'Панель администратора',
            ];

            return view('admin.index', $data);
        } else {
            abort(404);
        }
    });

    /**
     * Группа маршрутов для манипуляции элементами проекта. Адрес
     * /admin/pages
     */
    Route::group(['prefix' => 'pages'], function ()
    {
        /**
         * Роутер для маршрута
         * /admin/pages
         */
        Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);

        /**
         * Маршрут для добавления новых элементов на страницу (в Базу Данных)
         * /admin/pages/add
         */
        Route::match(['get', 'post'],'/add', ['uses' => 'PagesAddController@execute', 'as' => 'pagesAdd']);

        /**
         * Маршрут для редактирования страниц, т.е. изменения контента или удаления страничек
         * /admin/edit/2 (вместо 2 может стоять любая цифра или слово однозначно идентифицирующее страницу)
         */
        Route::match(['get', 'post', 'delete'], '/edit/{page}',
            ['uses' => 'PagesEditController@execute', 'as' => 'pagesEdit']);
    });

    /**
     * Группа маршрутов для манипуляции элементами проекта. Адрес
     * /admin/portfolio
     */
    Route::group(['prefix' => 'portfolio'], function ()
    {
        /**
         * Роутер для маршрута
         * /admin/portfolio
         */
        Route::get('/', ['uses' => 'PortfolioController@execute', 'as' => 'portfolio']);

        /**
         * Маршрут для добавления новых элементов на страницу (в Базу Данных)
         * /admin/portfolio/add
         */
        Route::match(['get', 'post'],'/add', ['uses' => 'PortfolioAddController@execute', 'as' => 'portfolioAdd']);

        /**
         * Маршрут для редактирования страниц, т.е. изменения контента или удаления страничек
         * /admin/edit/2 (вместо 2 может стоять любая цифра или слово однозначно идентифицирующее страницу)
         */
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}',
            ['uses' => 'PortfolioEditController@execute', 'as' => 'portfolioEdit']);
    });

    /**
     * Группа маршрутов для манипуляции элементами проекта. Адрес
     * /admin/services
     */
    Route::group(['prefix' => 'services'], function ()
    {
        /**
         * Роутер для маршрута
         * /admin/services
         */
        Route::get('/',
            ['uses' => 'ServicesController@execute', 'as' => 'services']);

        /**
         * Маршрут для добавления новых элементов на страницу (в Базу Данных)
         * /admin/services/add
         */
        Route::match(['get', 'post'],'/add',
            ['uses' => 'ServicesAddController@execute', 'as' => 'servicesAdd']);

        /**
         * Маршрут для редактирования страниц, т.е. изменения контента или удаления страничек
         * /admin/edit/2 (вместо 2 может стоять любая цифра или слово однозначно идентифицирующее страницу)
         */
        Route::match(['get', 'post', 'delete'], '/edit/{service}',
            ['uses' => 'ServicesEditController@execute', 'as' => 'servicesEdit']);
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index');

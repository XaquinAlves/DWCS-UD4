<?php

namespace Com\Daw2\Core;

use Steampixel\Route;

class FrontController
{
    static function main()
    {
        Route::add(
            '/',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->index();
            },
            'get'
        );

        Route::add(
            '/demo-proveedores',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->demo();
            },
            'get'
        );

        Route::pathNotFound(
            function () {
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error404();
            }
        );

        Route::methodNotAllowed(
            function () {
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error405();
            }
        );
        Route::add(
            '/inicio2',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->index2();
            },
            'get'
        );

        Route::add(
            '/iterativas03',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->showIterativas03();
            },
            'get'
        );

        Route::add('/iterativas03', function () {
            $controlador = new \Com\Daw2\Controllers\IterativasController();
            $controlador->doIterativas03();
        },
            'post');

        Route::add(
            '/iterativas04',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->showIterativas04();
            },
            'get'
        );

        Route::add('/iterativas04', function () {
            $controlador = new \Com\Daw2\Controllers\IterativasController();
            $controlador->doIterativas04();
        },
            'post');

        Route::add(
            '/iterativas05',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->showIterativas05();
            },
            'get'
        );

        Route::add('/iterativas05', function () {
            $controlador = new \Com\Daw2\Controllers\IterativasController();
            $controlador->doIterativas05();
        },
            'post');

        Route::add(
            '/iterativas06',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->showIterativas06();
            },
            'get'
        );

        Route::add('/iterativas06', function () {
            $controlador = new \Com\Daw2\Controllers\IterativasController();
            $controlador->doIterativas06();
        },
            'post');

        Route::add(
            '/iterativas07',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->showIterativas07();
            },
            'get'
        );

        Route::add('/iterativas07do', function () {
            $controlador = new \Com\Daw2\Controllers\IterativasController();
            $controlador->doIterativas07();
        },
            'get');

        Route::add(
            '/iterativas08',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->showIterativas08();
            },
            'get'
        );

        Route::add('/iterativas08', function () {
            $controlador = new \Com\Daw2\Controllers\IterativasController();
            $controlador->doIterativas08();
        },
            'post');

        Route::run();
    }
}

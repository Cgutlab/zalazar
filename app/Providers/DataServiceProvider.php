<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
/**
 * Bootstrap services.
 *
 * @return void
 */
public function boot()
{
    view()->composer(['adm.layouts.sidebar', 
                      'adm.auth.login',
                      'adm.layouts.navbar',
                      'layouts.navbar',
                    ], function ($view) {
            $logos = \App\Logo::where('ubicacion', 'navbar')->first();
            $view->with(compact('logos'));
        });

    view()->composer(['layouts.footer',
                    ], function ($view) {
            $logos = \App\Logo::where('ubicacion', 'footer')->first();
            $view->with(compact('logos'));
        });

    view()->composer(['layouts.footer', 
                      'page.contacto.index', 
                      'layouts.navbar'], function ($view) {
            $email        = \App\Dato::where('tipo', 'email')->first();
            $telefono     = \App\Dato::where('tipo', 'telefono')->first();
            $telefono_fax = \App\Dato::where('tipo', 'telefono_fax')->first();
            $whatsapp     = \App\Dato::where('tipo', 'whatsapp')->first();
            $aux1         = explode(' ', $whatsapp->descripcion);
            $aux2         = explode('-', $aux1[1]);
            $numeroWs     = '54'.$aux1[0].$aux2[0].$aux2[1];

            $view->with(compact('email', 'telefono','telefono_fax', 'whatsapp', 'numeroWs'));
        });
}




/**
 * Register services.
 *
 * @return void
 */
public function register()
{
    //
}
}

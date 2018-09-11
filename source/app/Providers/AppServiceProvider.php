<?php

namespace App\Providers;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Jabatan\Entities\Jabatan;
use Modules\ModulSistem\Entities\HakAksesModulSistem;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\PersonalisasiSistem\Entities\PersonalisasiSistem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->app['events']->listen(Authenticated::class, function ($e) {
            $jabatan = Jabatan::where('id', '=', $e->user->jabatan_id)->value('nama');

            view()->share('role', ucwords($jabatan));

            $modul_akses = HakAksesModulSistem::where('id_jabatan', '=', $e->user->jabatan_id)->pluck('id_modul');

            $navigations = ModulSistem::whereIn('id', $modul_akses)->orderBy('modul')->get();

            view()->share('navigations', $navigations);
        });

        $sistem = PersonalisasiSistem::where('id', '=', '1')->value('nama');

        view()->share('sistem', $sistem);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

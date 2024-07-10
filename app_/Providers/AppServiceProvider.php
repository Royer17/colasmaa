<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composers(['App\Http\Controllers\GlobalController' => ['pages.services.citizen-security', 'pages.district.history', 'pages.municipality.mission-and-vision', 'pages.municipality.mayor', 'pages.municipality.city-council', 'pages.municipality.commissions', 'pages.normativity.mayoral-resolutions', 'pages.normativity.mayoral-decrees', 'pages.normativity.municipal-ordinances', 'pages.normativity.municipal-management-resolutions', 'pages.normativity.municipal-council-agreements', 'pages.normativity.other-documents', 'pages.transparency-portal', 'pages.communiques.index', 'pages.communiques.detail', 'pages.modernization.municipal-taxes', 'pages.modernization.building-license', 'pages.modernization.operating-license', 'pages.modernization.complaints-book', 'pages.news.detail', 'pages.convocatoria.convocatoria', 'pages.news.index', 'pages.works.index', 'pages.docs.doc', 'pages.municipality.officials', 'pages.municipality.organization-chart', 'pages.municipality.phone-book', 'pages.videos.index', 'pages.schedule', 'pages.normativity.index'],
        ]);

        View::composers(['App\Http\Controllers\Admin\GlobalController' => ['admin.layouts.aside'],
        ]);

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

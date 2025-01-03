<?php

namespace App\Providers;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     */

     public function boot()
     {
         view()->composer('*', function ($view) {
             if (Auth::check()) {
                 DB::table('users')->where('id', Auth::id())->update([
                     'last_seen' => Carbon::now(),
                     'is_online' => true,
                 ]);
             }
         });

         // Automatically mark users offline if they haven't interacted recently
         $this->markUsersOffline();
     }

     // Function to update users' online status
     protected function markUsersOffline()
     {
         DB::table('users')
             ->where('last_seen', '<', Carbon::now()->subMinutes(5))
             ->update(['is_online' => false]);
     }
    /**
     * Bootstrap any application services.
     */
 }

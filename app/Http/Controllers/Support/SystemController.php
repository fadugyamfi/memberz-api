<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SystemController extends Controller
{
    public function migrate() {
        Artisan::call('migrate', ['--force' => true]);

        return response()->json(['message' => 'Migrations run']);
    }

    public function rollback() {
        Artisan::call('migrate:rollback');

        return response()->json(['message' => 'Rollback performed']);
    }

    public function seed() {
        Artisan::call('db:seed');

        return response()->json(['message' => 'Database seeded']);
    }

    public function cacheRoutes() {
        Artisan::call('route:cache');

        return response()->json(['message' => 'Routes cached']);
    }

    public function cacheConfig() {
        Artisan::call('config:cache');

        return response()->json(['message' => 'Config cached']);
    }

    public function cacheClear() {
        Artisan::call('cache:clear');

        return response()->json(['message' => 'Cache cleared']);
    }
}

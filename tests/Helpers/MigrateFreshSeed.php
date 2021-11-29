<?php

namespace Tests\Helpers;

use Illuminate\Support\Facades\Artisan;

trait MigrateFreshSeed
{
    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh --seed');
    }
}

<?php

namespace App\Services;

use App\Models\Driver;
use Illuminate\Support\Collection;
class DriverSearchService
{
    public function findBestDriver(string $pickupLocation): ?Driver
    {
        return Driver::where('status', 'available')
                    ->orderBy('rating', 'desc')
                    ->first();
    }

    public function findAvailableDrivers(string $pickupLocation = ''): Collection
    {
        return Driver::where('status', 'available')
                    ->orderBy('rating', 'desc')
                    ->get();
    }
}
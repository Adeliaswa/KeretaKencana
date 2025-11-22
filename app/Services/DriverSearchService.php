<?php

namespace App\Services;

use App\Models\Driver;
use Illuminate\Support\Collection;
class DriverSearchService
{
    public function findBestDriver(string $pickupLocation): ?Driver
    {
        $query = Driver::query();
        $query->where('is_available', true);
        $query->orderBy('rating', 'desc');

        $bestDriver = $query->first();

        return $bestDriver;
    }

    public function findAvailableDrivers(string $pickupLocation = ''): Collection
    {
        return Driver::where('is_available', true)
                     ->orderBy('rating', 'desc')
                     ->get();
    }
}
<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class HolidayEventsService
{
    private string $api_url = 'https://holidayapi.com/v1/holidays';

    private string $api_key = '3cb15259-a914-4be3-96fa-841a5b394a2f';

    private $year = '2022';

    public function listHolidays(string $country): Collection
    {
        $url = $this->api_url . '?key=' . $this->api_key . '&country=' . $country . '&year=' . $this->year;
        $response = Http::get($url);
        $holidays = collect(json_decode($response->body(), true)['holidays'])
            ->map(fn($holiday) => (object)$holiday);
        ray($holidays);
        return $holidays;
    }
}


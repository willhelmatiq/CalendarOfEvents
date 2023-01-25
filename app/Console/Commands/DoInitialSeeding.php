<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DoInitialSeeding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:initial-seeding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'countries are seeded';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = config('calendarofevents.holiday_api') . '/countries?key=' . config('calendarofevents.api_key');
        ray($url);
        $response = Http::get($url);

        $countries = collect(collect(json_decode($response->body(), true))->get("countries"))->sortBy('name');
        $countries->each(function($countryFromApi) {
            $country = Country::firstOrCreate(['code'=>$countryFromApi['code'],
                'name'=>$countryFromApi['name'], 'flag'=>$countryFromApi['flag']]);
            $country->save();
        });
        return Command::SUCCESS;
    }
}

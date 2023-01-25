<?php

namespace App\Http\Controllers;

use App\Helpers\CollectionHelper;
use App\Services\HolidayEventsService;
use Illuminate\Http\Request;


class HolidayController extends Controller
{
    private HolidayEventsService $holidayEventsService;

    public function __construct(HolidayEventsService $holidayEventsService)
    {
        $this->holidayEventsService = $holidayEventsService;
    }

    public function index(Request $request)
    {


        $holidays1 = $this->holidayEventsService->listHolidays('ES');
        $holidays = CollectionHelper::paginate($holidays1, 5);
//        ray($events);
//        dd($events);
        return view('events.index', compact('holidays'));
    }
}

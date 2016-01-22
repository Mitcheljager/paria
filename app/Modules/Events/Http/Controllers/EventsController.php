<?php namespace App\Modules\Events\Http\Controllers;

use App\Modules\Events\Event;
use URL, Request, FrontController;

class EventsController extends FrontController {

    public function __construct()
    {
        $this->modelName = 'Event';

        parent::__construct();
    }

    public function index()
    {
        $events = Event::orderBy('starts_at', 'DESC')->get();

        $this->pageView('events::index', compact('events'));
    }

    /**
     * Show an event
     * 
     * @param  int $id The id of the event
     * @return void
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        $this->title($event->title);

        $this->pageView('events::show', compact('event'));
    }

    /**
     * Show calendar with all events
     * 
     * @return void
     */
    public function calendar($year = null, $month = null)
    {
        if (Request::ajax()) {
            $widget = new CalendarWidget;
            return $widget->render(compact('year', 'month'));
        } else {
            $this->title(trans('app.calendar'));
            $this->pageView('events::calendar', compact('year', 'month'));
        }
    }

    public function globalSearch($subject)
    {
        $events = Event::where('title', 'LIKE', '%'.$subject.'%')->get();

        $results = array();
        foreach ($events as $event) {
            $results[$event->title] = URL::to('events/'.$event->id.'/'.$event->slug);
        }

        return $results;
    }

}
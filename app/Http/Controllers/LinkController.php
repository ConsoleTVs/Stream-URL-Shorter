<?php

namespace App\Http\Controllers;

use App\Link;
use Identify;
use ConsoleTVs\Support\Helpers;
use App\Http\Requests\CreateLink;
use Charts;

class LinkController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = auth()->user()->links;

        return view('home', compact('links'));
    }

    /**
     * Creates a new link.
     *
     * @author Erik Campobadal Fores <soc@erik.cat>
     * @copyright 2017       erik.cat
     * @param     CreateLink $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateLink $request)
    {
        auth()->user()->links()->create([
            'url' => $request->url,
            'slug' => str_random(10),
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Link creado');
    }

    /**
     * Redirects the request to the original URL.
     *
     * @author Erik Campobadal Fores <soc@erik.cat>
     * @copyright 2017   erik.cat
     * @param     string $slug
     * @return \Illuminate\Http\Response
     */
    public function redirect(string $slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();

        $link->views()->create([
            'browser' => Identify::browser()->getName(),
            'os' => Identify::os()->getName(),
            'lang' => Identify::lang()->getLanguage(),
            'ip' => Helpers::clientIP(),
        ]);

        return redirect($link->url);
    }

    /**
     * Shows the link statistics
     *
     * @author Erik Campobadal Fores <soc@erik.cat>
     * @copyright 2017 erik.cat
     * @param Link $link
     * @return \Illuminate\Http\Response
     */
    public function statistics(Link $link)
    {
        if ($link->user->id != auth()->user()->id) {
            abort(404);
        }

        $requests_chart = Charts::database($link->views, 'line', 'highcharts')
            ->title("Requests")
            ->dimensions(0, 400)
            ->lastByday(date('m'), date('Y'), true);

        $views_chart = Charts::database($link->views->unique('ip'), 'line', 'highcharts')
            ->title("Visitas")
            ->dimensions(0, 400)
            ->lastByday(date('m'), date('Y'), true);

        $browsers_chart = Charts::database($link->views, 'pie', 'highcharts')
            ->groupBy('browser');

        $os_chart = Charts::database($link->views, 'pie', 'highcharts')
            ->groupBy('os');

        $lang_chart = Charts::database($link->views, 'pie', 'highcharts')
            ->groupBy('lang');

        return view('statistics', compact([
            'link', 'requests_chart', 'views_chart',
            'browsers_chart', 'os_chart', 'lang_chart'
        ]));
    }
}

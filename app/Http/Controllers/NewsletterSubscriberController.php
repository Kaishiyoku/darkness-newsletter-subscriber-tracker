<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsletterSubscriberController extends Controller
{
    /**
     * @var string
     */
    public $redirectionRoute = 'newsletter_subscribers.index';

    /**
     * @var array
     */
    public $validationRules = [
        'name' => ['required'],
        'profile_url' => ['required', 'url'],
        'post_url' => ['required', 'url'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletterSubscribers = NewsletterSubscriber::orderBy('name');

        return view('newsletter_subscriber.index', compact('newsletterSubscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsletterSubscriber = new NewsletterSubscriber();

        return view('newsletter_subscriber.create', compact('newsletterSubscriber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $newsletterSubscriber = new NewsletterSubscriber($request->all());
        $newsletterSubscriber->save();

        flash()->success(__('newsletter_subscriber.create.success'));

        return redirect()->route($this->redirectionRoute);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterSubscriber  $newsletterSubscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsletterSubscriber $newsletterSubscriber)
    {
        return view('newsletter_subscriber.edit', compact('newsletterSubscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterSubscriber  $newsletterSubscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsletterSubscriber $newsletterSubscriber)
    {
        $request->validate($this->validationRules);

        $newsletterSubscriber->fill($request->all());
        $newsletterSubscriber->save();

        flash()->success(__('newsletter_subscriber.edit.success'));

        return redirect()->route($this->redirectionRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterSubscriber $newsletterSubscriber
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        $newsletterSubscriber->delete();

        flash()->success(__('newsletter_subscriber.destroy.success'));

        return redirect()->route($this->redirectionRoute);
    }

    public function code()
    {
        $date = Carbon::now();
        $newsletterSubscribers = NewsletterSubscriber::orderBy('name')->get();

        $prefix = '[color=#439F83][size=90]Updated as of ' . $date->format('j M Y') . '[/size][/color]' . "\n\n";
        $newsletterSubscriberCode = $prefix . $newsletterSubscribers->reduce(function ($carry, $item) {
            return $carry . "[url=$item->post_url]$item->name[/url]" . "\n";
        });

//        dd($newsletterSubscriberCode);

        return view('newsletter_subscriber.code', compact('newsletterSubscriberCode'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'price' => 'required|numeric'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home',
            ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    /** Show the panel for adding a new ad
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('bb-create');
    }

    /** Adding an Update Deployment to the Database
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(self::BB_VALIDATOR);
        Auth::user()->bbs()->create([
            'title' => $validated['title'],
            'content' => $request -> description,
            'price' => $validated['price']
        ]);

        return redirect()->route('home');
    }

    /** Displaying a page with an ad edit form
     *
     * @param Bb $bb
     * @return Renderable
     */
    public function edit(Bb $bb): Renderable
    {
        return view('bb-edit', ['bb' => $bb]);
    }

    /** Saving the corrected ad
     *
     * @param Request $request
     * @param Bb $bb
     * @return RedirectResponse
     */
    public function update(Request $request, Bb $bb): RedirectResponse
    {
        $validated = $request->validate(self::BB_VALIDATOR);
        $bb->fill([
            'title' => $validated['title'],
            'content' => $request -> description,
            'price' => $validated['price']
        ]);
        $bb->save();

        return redirect()->route('home');
    }

    /**
     * Displaying the object deletion page
     * @param Bb $bb
     * @return Application|Factory|View
     */
    public function delete(Bb $bb): View|Factory|Application
    {
        return view('bb-delete', ['bb' => $bb]);
    }

    /**
     * Removing an ad
     * @param Bb $bb
     * @return RedirectResponse
     */
    public function destroy(Bb $bb): RedirectResponse
    {
        $bb->delete();
        return redirect()->route('home');
    }
}

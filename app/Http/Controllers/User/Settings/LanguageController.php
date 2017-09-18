<?php

namespace Tikematic\Http\Controllers\User\Settings;

use Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tikematic\Http\Controllers\Controller;
use Tikematic\Repositories\Contracts\UserRepository;

class LanguageController extends Controller
{

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Show the language update view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLanguages()
    {
        return view('settings.languages');
    }

    /**
     * Update user's language.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateLanguage(Request $request)
    {

        $this->validate($request, [
            'display_language' => [
                Rule::in(['none', 'fi', 'en']),
            ],
        ]);

        $this->user->update(
            $this->user->authenticated()->id,
            ["language" => $request->display_language]
        );

        return redirect()
            ->route('settings.language')
            ->with([
                "flash_status" => "success",
                "flash_message" => Helper::tra('settings.flash.language', [], $request->display_language),
            ]);
    }
}

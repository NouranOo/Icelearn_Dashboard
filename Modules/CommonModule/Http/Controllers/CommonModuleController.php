<?php

namespace Modules\CommonModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
// use Modules\CommonModule\Helper\UploaderHelper;
use Modules\CommonModule\Helper\arabicdate;
use Modules\CommonModule\Helper\LanguageHelper;

class CommonModuleController extends Controller
{
    use arabicdate;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        /**
         * use the facade we created.
         * LanguageHelper::getLang();
         */
        $arabic_date = $this->ArabicDate();

        return view('commonmodule::index', ['date' => $arabic_date]);
    }

    public function cat()
    {
        /**
         * use the facade we created.
         * LanguageHelper::getLang();
         */

        return view('commonmodule::index');
    }

    /**
     * Set the Localization of the Content.
     *
     * @return void
     */
    public function setLocal($lang)
    {
        Session::put('applocale', $lang);
        return redirect()->back();
    }

    /**
     * Activate Languages From DB.
     *
     * @param   Request  $request  [$request description]
     *
     * @return  [type]             [return description]
     */
    public function activateLang(Request $request)
    {
        $ar_lang = $request->get('arActivate');
        $en_lang = $request->get('enActivate');

        LanguageHelper::activateLangs($ar_lang, $en_lang);

        return redirect()->to('/admin-panel');
    }

    /**
     * Redirect user to the activation view.
     *
     * @return  [type]  [return description]
     */
    public function activate()
    {
        $langs = LanguageHelper::getAllLangs();
        return view('commonmodule::Language', ['langs' => $langs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('commonmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('commonmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('commonmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}

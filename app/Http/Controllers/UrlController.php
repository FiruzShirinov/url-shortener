<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use Exception;

class UrlController extends Controller
{
    public function index()
    {
        $urls = Url::latest()->limit(10)->get();
        return view('welcome', compact('urls'));
    }
    public function storeAndList(UrlRequest $request)
    {
        if ($request->ajax()) {
            try {
                Url::create($request->validated());
                return Url::latest()->limit(10)->get();
            } catch (Exception $e) {
                return $e;
            }
        }
        abort(404);
    }
}

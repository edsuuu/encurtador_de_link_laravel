<?php

namespace App\Http\Controllers;

use App\Models\ShortnerLink;
use App\Models\ViewsByUrl;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function validateUrlAndCountView(Request $request, $encodeUrl)
    {
        $validateShortUrl = ShortnerLink::query()->where('short_code', $encodeUrl)->first();

        if (!$encodeUrl || !$validateShortUrl) {
            return abort(404, 'Link Invalido');
        }

        ViewsByUrl::create([
            'shortner_link_id' => $validateShortUrl->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect($validateShortUrl->url);
    }
}

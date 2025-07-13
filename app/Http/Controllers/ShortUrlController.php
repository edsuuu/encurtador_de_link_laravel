<?php

namespace App\Http\Controllers;

use App\Models\ShortnerLink;
use App\Models\ViewsByUrl;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ShortUrlController extends Controller
{
    public function index(Request $request)
    {
        Log::channel('daily')->info("Return navigator ip {$request->ip()}");

        $this->getIp($request->ip(), $request->headers->all());

        return redirect(config('app.redirectUrl'));
    }

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

        $this->getIp($request->ip(), $request->headers);

        return redirect($validateShortUrl->url);
    }


    /**
     * @throws ConnectionException
     * @throws \JsonException
     */
    public function getIp($ip, $header = null)
    {
        unset($header['cookie']);

        $response = Http::get('http://ip-api.com/json/' . $ip);

        $data2 = [
            $header,
            $response->json(),
        ];

        $data = [
            "username" => "Webhook",
                "content" => 'Payload Received',
                "embeds" => [
                    [
                        "title"=> "Information received",
                        "description"=> json_encode($data2, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT),
                        "color"=> 0x3498db
                    ]
                ]
        ];

        return Http::post( config('app.webhook'), $data);
    }


    public function debugHeaders(Request $request)
    {
        return $this->index($request);
    }
}

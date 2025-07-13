<?php

namespace App\Http\Controllers;

use App\Models\ShortnerLink;
use App\Models\ViewsByUrl;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShortUrlController extends Controller
{
    public function index(Request $request)
    {
        $this->getIp($request->ip());

        return redirect('https://www.playstation.com/pt-br/playstation-network');
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

        $this->getIp($request->ip());

        return redirect($validateShortUrl->url);
    }


    /**
     * @throws ConnectionException
     * @throws \JsonException
     */
    public function getIp($ip)
    {
        $response = Http::get('http://ip-api.com/json/' . $ip);

        $data = [
            "username" => "Webhook",
                "content" => 'Payload Received',
                "embeds" => [
                    [
                        "title"=> "Information received",
                        "description"=> json_encode($response->json(), JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT),
                        "color"=> 0x3498db
                    ]
                ]
        ];

        return Http::post( config('app.webhook'), $data);
    }
}

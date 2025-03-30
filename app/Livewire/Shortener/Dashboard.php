<?php

namespace App\Livewire\Shortener;

use App\Models\ShortnerLink;
use Livewire\Component;

class Dashboard extends Component
{
    public $urlShort, $codeUrl, $allUrlShorts;

    public function mount()
    {

        $allUrls = ShortnerLink::with('views')->get();

        foreach ($allUrls as $url) {
            $url->short_code =  route('redirect', ['encodeUrl' => $url->short_code]);
        }

        $this->allUrlShorts = $allUrls;
    }

    public function render()
    {
        return view('livewire.shortener.dashboard');
    }
}

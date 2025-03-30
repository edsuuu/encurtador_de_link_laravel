<?php

namespace App\Livewire\Shortener;

use App\Models\ShortnerLink;
use Livewire\Component;

class Generate extends Component
{
    public $link, $title, $urlShort;

    public function saveUrlForShortner()
    {
        $validate = $this->validate([
            'title' => 'required',
            'link' => 'required|url',
        ], [
            'required' => 'O :attribute é obrigatório.',
            'url' => 'O :attribute é deve ser uma URL valida.'
        ], [
            'title' => 'Título',
            'link' => 'Link',
        ]);

        $shortCode = substr(md5($validate['link'] . time()), 16);

        $createdShortLink = ShortnerLink::create([
            'title' => $validate['title'],
            'url' => $validate['link'],
            'short_code' => $shortCode,
            'user_id' => auth()->check() ? auth()->user()->id : null
        ]);


        if ($createdShortLink) {
            $this->urlShort = route('redirect', ['encodeUrl' => $shortCode]);

            $this->title = '';
            $this->link = '';
        }
    }

    public function render()
    {
        return view('livewire.shortener.generate');
    }
}

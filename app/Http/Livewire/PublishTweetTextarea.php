<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PublishTweetTextarea extends Component
{
    public $string = '';
    public function render()
    {
        $characters = strlen($this->string);

        $limit = false;
        if ($characters > 255) {
            $limit = true;
        }

        return view('livewire.publish-tweet-textarea', [
            'characters' => $characters,
            'limit' => $limit,
        ]);
    }
}

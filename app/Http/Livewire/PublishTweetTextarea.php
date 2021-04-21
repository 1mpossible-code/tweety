<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PublishTweetTextarea extends Component
{
    public $string = '';

    public function render()
    {
        $characters = strlen($this->string);

        $limit = $this->is_limited($characters);

        return view('livewire.publish-tweet-textarea', [
            'characters' => $characters,
            'limit' => $limit,
        ]);
    }

    private function is_limited(int $characters)
    {
        $limit = false;
        if ($characters > 255) {
            $limit = true;
        }
        return $limit;
    }

}

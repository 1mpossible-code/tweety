<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;

class MentionService
{
    public function mentnionedUsers(Model $model)
    {
        preg_match_all('/@(\S+)/', $model->body, $matches);
        return array_unique( $matches[1] );
    }
}

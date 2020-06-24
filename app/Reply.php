<?php

namespace App;


class Reply extends Model
{
    //

    public function user() {

        return $this->belongsTo("App\User");
    }

    // public function reply() {

    //     return $this->belongsTo("App\Reply");
    // }

    public function discussion() {
        return $this->belongsTo("App\Discussion");
    }
}


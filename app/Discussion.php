<?php

namespace App;



class Discussion extends Model
{
    //

    public function user() {

       return $this->belongsTo("App\User");
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function replies() {

        return $this->hasMany("App\Reply");
    }

    public function bestReply() {

        return $this->belongsTo(Reply::class , 'reply_id');
    }

    public function markAsBestReply(Reply $reply) {

        $this->update([
            'reply_id'=>$reply->id
        ]);
    }
}
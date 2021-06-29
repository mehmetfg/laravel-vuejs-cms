<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    //
    protected $guarded=[



    ];

    public function dealer()
    {
        return $this->belongsTo("App\Dealer");
    }

    protected $casts=[
      "date"=>'datetime:Y-m-d',
    ];
}

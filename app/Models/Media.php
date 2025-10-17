<?php

// app/Models/Media.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['type', 'path'];

    // Quan hệ Polymorphic với các models khác (News, Categories, v.v...)
    public function mediable()
    {
        return $this->morphTo();
    }
}

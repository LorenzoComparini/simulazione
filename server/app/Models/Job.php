<?php

namespace App\Models;

use App\Http\Controllers\LanguageController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public $with = [
        'language'
    ];

    public function language(){
        return $this->belongsTo(Language::class);
    }
}

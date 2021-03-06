<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Step extends Model
{
    protected $appends = ['picture_path', 'formatted_date'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'user_id',
        'journey_id',
        'published_at',
        'description',
        'date',
        'time',
        'picture',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'journey_id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function journey()
    {
        return $this->belongsTo(\App\Journey::class);
    }
    public function getPicturePathAttribute()
    {
        return  $this->picture ? asset(Storage::url($this->picture)) : null;
    }
    public function formattedTime()
    {
        return $this->time ? date('h:i a',  strtotime($this->time)) : '';
    }
    public function getFormattedDateAttribute()
    {
        return date('F d, Y', strtotime($this->date));
    }
}

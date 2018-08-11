<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// These two come from Media Library
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Notifications\Notifiable;

class Task extends Model implements HasMedia
{
    //
    use SoftDeletes , HasMediaTrait , Notifiable;

    protected $dates = ['deleted_at'];
    protected $fillable= [
        'name' ,'period' , 'description' ,'task_end_time', 'user_id'
    ];

    public function user()
        {
            return $this->belongsTo('App\User');
        }
    public function registerMediaConversions(Media $media = null)
        {
            $this->addMediaConversion('thumb')
                ->width(100)
                ->height(100);
        }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable=['name','lastname','username','email','password','bio','city_id','province_id','grade_id','soldier_service_id','field_id','university_id','core_id','area_id','job_id','nationcode','father_name','phonenumber','image_path','birthday','martial','status','address','konkor_grade'];
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getThumbnailAttribute()
    {
        $image=$this->image_path;
        $thumbnail=str_replace('//','/thumbs/',$image);
        return $thumbnail;
    }

    public function core()
    {
        return $this->belongsTo(Core::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);

    }
     public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function soldier_service()
    {
        return $this->belongsTo(SoldierServices::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    /*public function message_users()
    {
        return $this->morphMany('App\MessageUser', 'fuser');
    }*/

    public function messages()
    {
        return $this->belongsToMany('App\messages', 'tuser_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class , 'event_users' , 'user_id');
    }

}

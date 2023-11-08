<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Facility extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->create_by = Auth::user()->id;
        });
    }

    public function chilldren()
    {
        return $this->hasMany('App\Models\FacilityImage','facility_id');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\User','create_by');
    }

    public function editor()
    {
        return $this->belongsTo('App\Models\User','edit_by');
    }
    public function deletor()
    {
        return $this->belongsTo('App\Models\User','delete_by');
    }
    public function restorer()
    {
        return $this->belongsTo('App\Models\User','restore_by');
    }
}

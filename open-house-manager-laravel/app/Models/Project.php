<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'name',
        'detail',
        'marks',
        'status',
        'assign_status',
        'member1_id',
        'member2_id',
        'member3_id',
        'location_id',
        'category_id',
    ];

    public function member1() {
        return $this->belongsTo('App\Models\User');
    }

    public function member2() {
        return $this->belongsTo('App\Models\User');
    }

    public function member3() {
        return $this->belongsTo('App\Models\User');
    }

    public function location() {
        return $this->belongsTo('App\Models\Location');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function evaluators() {
        return $this->belongsToMany('App\Models\User', 'evaluations', 'project_id', 'evaluator_id');
    }
}

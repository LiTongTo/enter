<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavModel extends Model
{
    protected $primaryKey="id";
    protected $table="nav";
    public $timestamps=false;
    protected $guarded=[];//黑名单为空 
}

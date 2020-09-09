<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = 'comments';
	public $timestamps = false;
    protected $primaryKey = 'id_comments';
    protected $fillable = ['co_desc', 'co_status', 'co_id_publicacion'];
}

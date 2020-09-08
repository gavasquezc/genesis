<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publications extends Model
{

	protected $table = 'publications';
	public $timestamps = false;
    protected $primaryKey = 'id_publications';
    protected $fillable = ['pu_desc', 'pu_status', 'pu_id_user', 'pu_titulo', 'pu_foto'];
    

}

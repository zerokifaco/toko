<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
     protected $table="datatables_data";
     protected $fillable = ['first_name', 'last_name', 'email', 'gender', 'country', 'salary'];
     
}

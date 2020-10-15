<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FormSubmit extends Model
{
    protected $table = 'form_submit';

    protected $fillable = array('name', 'phone', 'email', 'location', 'message');
}

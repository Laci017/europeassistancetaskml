<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * @package App\Models
 *
 * @property string $name
 *
 */
class Status extends Model
{
    protected $table = 'statuses';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Priority
 * @package App\Models
 *
 * @property string $name
 * @property string $description
 * @property string $color
 *
 */
class Priority extends Model
{
    protected $table = 'priorities';
    public $timestamps = false;
}

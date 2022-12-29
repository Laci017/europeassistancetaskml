<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App\Models
 *
 * @property string $name
 * @property string $description
 * @property int $priority_id
 * @property int $status_id
 * @property dateTime $deadline
 * @property int $created_by
 * @property int $updated_by
 * @property boolean $is_multi_resp
 *
 */
class Task extends Model
{
    protected $table = 'tasks';
    public $timestamps = true;

    public function status()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    public function priority()
    {
        return $this->hasOne('App\Models\Priority', 'id', 'priority_id');
    }

    public function creator()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function updater()
    {
        return $this->hasOne('App\Models\User', 'id', 'updated_by');
    }

    public function responsible()
    {
        return $this->hasMany('App\Models\Responsible', 'task_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Responsible
 * @package App\Models
 *
 * @property integer $task_id
 * @property integer $responsible_id
 *
 */
class Responsible extends Model
{
    protected $table = 'responsibles';
    public $timestamps = false;

    /**
     * Get the task that owns the record.
     */
    public function task()
    {
        return $this->belongsTo(Task::class, 'id', 'task_id');
    }

    /**
     * Get the user that owns the record.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'responsible_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property int $id
 */
class Tag extends Model
{
    protected $table = 'court_decisions_tags';

    protected $fillable = ['name'];
}

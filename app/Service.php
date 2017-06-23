<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Service
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service whereIcon($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    //
}

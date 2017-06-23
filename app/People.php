<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\People
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string $images
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\People whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\People whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\People whereImages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\People whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\People wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\People whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\People whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class People extends Model
{
    //
}

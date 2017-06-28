<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Portfolio
 *
 * @property int $id
 * @property string $name
 * @property string $images
 * @property string $filter
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereFilter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereImages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Portfolio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Portfolio extends Model
{
    protected $fillable = ['name', 'images', 'filter'];
}

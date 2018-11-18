<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsletterSubscriber
 *
 * @property int $id
 * @property string $name
 * @property string $profile_url
 * @property string $post_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber wherePostUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber whereProfileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\NewsletterSubscriber whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsletterSubscriber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'profile_url', 'post_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    protected $casts = [
        //
    ];
}
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *      title="User",
 *      description="User",
 *      type="object",
 *      required={"email","password"}
 * )
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @OA\Property(
     *      property="id",
     *      title="id",
     *      description="id"
     * )
     *
     * @var integer
     */

    /**
     * @OA\Property(
     *      property="name",
     *      title="name",
     *      description="name"
     * )
     *
     * @var string
     */

    /**
     * @OA\Property(
     *      property="email",
     *      title="email",
     *      description="email"
     * )
     *
     * @var string
     */

    /**
     * @OA\Property(
     *      property="emailVerifiedAt",
     *      title="email_verified_at",
     *      description="email_verified_at"
     * )
     *
     * @var \DateTime
     */

    /**
     * @OA\Property(
     *      property="password",
     *      title="password",
     *      description="password"
     * )
     *
     * @var string
     */

    /**
     * @OA\Property(
     *      property="rememberToken",
     *      title="remember_token",
     *      description="remember_token"
     * )
     *
     * @var string
     */

    /**
     * @OA\Property(
     *      property="createdAt",
     *      title="created_at",
     *      description="created_at"
     * )
     *
     * @var \DateTime
     */

    /**
     * @OA\Property(
     *      property="updatedAt",
     *      title="updated_at",
     *      description="updated_at"
     * )
     *
     * @var \DateTime
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

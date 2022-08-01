<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;
use App\Models\UserOrder;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function validateAuth($request) {

        $validated = $request->validate([
            'email' => 'required|email|exists:App\Models\User,email',
            'password' => 'required|min:6'
        ]);

        return $validated;

    }

    public static function validateRegister($request) {

        $validated = $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|max:100|unique:App\Models\User,email',
            'password' => 'required|min:6|max:100',
            'password-repeat' => 'required|same:password|max:100'
        ], [
            'password.min' => 'Mật khẩu phải có ít nhất :min kí tự.',
            'password.max' => 'Mật khẩu phải ít hơn :max kí tự.',
            'password-repeat.same' => 'Mật khẩu nhập lại không giống với mạt khẩu ban đầu .',
            'password-repeat.max'  => 'Mật khẩu nhập lại không lớn hơn :max kí tự.'
        ]);

        return $validated;

    }

    public function carts() {
        return $this->belongsToMany(Product::class, 'carts')
                    ->withPivot('number');
    }

    public function user_orders() {
        return $this->hasMany(UserOrder::class);
    }
}

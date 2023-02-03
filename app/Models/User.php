<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

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
        'role',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function index()
    {
        $staffs = DB::table('users')->get();
        return $staffs;
    }
    public function store($staffs)
    {
        DB::table('users')->insert([
            'name' => $staffs->name,
            'email' => $staffs->email,
            'role' => $staffs->role,
            'password' => $staffs->password,
        ]);
    }

    public function edit($user)
    {
        DB::table('users')->where('id', '=', $user->id)
            ->update([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'role' => $user->role,
            ]);
    }
    public function destroyer($staffs)
    {
        DB::table('users')->delete($staffs->id);
    }
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('img/default/default-user.jpg');
        }
        return asset('img/user/' . $this->name . '-' . $this->id . '/' . $this->avatar);
    }




}

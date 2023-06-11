<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    public $timestamps = false;
    public function isAdmin()
    {
        return $this->access_type === 'admin'; // Remplacez 'type' par le champ correspondant dans votre table "users"
    }

    public function isReader()
    {
        return $this->access_type === 'reader'; // Remplacez 'type' par le champ correspondant dans votre table "users"
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'tel',
        'email',
        'password',
        'picture_path'
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
        'password' => 'hashed',
    ];

    /**
     * Update the user's name in the database.
     *
     * @param  string  $name
     * @return bool
     */
    public function updateName($name)
    {
        $this->name = $name;
        return $this->save();
    }

    /**
     * Update the user's email in the database.
     *
     * @param  string  $email
     * @return bool
     */
    public function updateEmail($email)
    {
        $this->email = $email;
        return $this->save();
    }

    /**
     * Update the user's telephone number in the database.
     *
     * @param  string  $tel
     * @return bool
     */
    public function updateTel($tel)
    {
        $this->tel = $tel;
        return $this->save();
    }

    /**
     * Update the user's picture path in the database.
     *
     * @param  string  $picture_path
     * @return bool
     */
    public function updatePicturePath($picture_path)
    {
        $this->picture_path = $picture_path;
        return $this->save();
    }

    /**
     * Update the user's access type in the database.
     *
     * @param  string  $accessType
     * @return bool
     */
    public function updateAccessType($accessType)
    {
        $this->access_type = $accessType;
        return $this->save();
    }
    public function polls()
    {

        return $this->belongsToMany(Poll::class, 'user_poll')
            ->using(UserPoll::class);    }
}
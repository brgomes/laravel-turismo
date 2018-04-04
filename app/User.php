<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    public function newUser(Request $request, $filename = null)
    {
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['is_admin'] = isset($data['is_admin']);

        return $this->create($data);
    }

    public function updateUser(Request $request, $filename = null)
    {
        $data = $request->all();

        if (isset($data['password']) && ($data['password'] != '')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $data['is_admin'] = isset($data['is_admin']);

        return $this->update($data);
    }

    public function search($keySearch, $totalPage = 10)
    {
        return $this->where('name', 'LIKE', "%{$keySearch}%")
                    ->orWhere('email', $keySearch)
                    ->paginate($totalPage);
    }

}

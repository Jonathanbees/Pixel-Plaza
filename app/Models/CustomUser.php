<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CustomUser extends Model
{
    use HasFactory;

    /**
     * CUSTOM USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the custom user primary key (id)
     * $this->attributes['username'] - string - contains the custom user username
     * $this->attributes['email'] - string - contains the custom user email
     * $this->attributes['password'] - string - contains the custom user password
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date
     */
    protected $guarded = ['id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:custom_users',
            'password' => 'required|string|min:8',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getUsername(): string
    {
        return $this->attributes['username'];
    }

    public function setUsername(string $username): void
    {
        $this->attributes['username'] = $username;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->attributes['updated_at'];
    }
}

<?php

// Samuel

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class CustomUser extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;

    /**
     * CUSTOM USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the custom user primary key (id)
     * $this->attributes['name'] - string - contains the custom user name
     * $this->attributes['email'] - string - contains the custom user email
     * $this->attributes['password'] - string - contains the custom user password
     * $this->attributes['is_admin'] - boolean - indicates if the user is an admin
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date
     * $this->company - Company - contains the associated Company (optional)
     * $this->reviews - Review[] - contains the reviews associated with the custom user
     */
    protected $guarded = ['id'];

    public static function validate(Request $request, ?int $id = null): void
    {
        $uniqueEmailRule = 'unique:custom_users,email';
        if ($id) {
            $uniqueEmailRule .= ','.$id;
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|'.$uniqueEmailRule,
            'password' => $id ? 'nullable|string|min:8' : 'required|string|min:8',
            'is_admin' => 'boolean',
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

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
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

    public function getIsAdmin(): bool
    {
        return $this->attributes['is_admin'];
    }

    public function setIsAdmin(bool $isAdmin): void
    {
        $this->attributes['is_admin'] = $isAdmin;
    }

    public function getCreatedAt(): ?string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): ?string
    {
        return $this->attributes['updated_at'];
    }

    public function getCompany(): HasOne
    {
        return $this->hasOne(Company::class, 'user_id');
    }

    public function setCompany(Company $company): void
    {
        $this->company()->associate($company);
    }

    public function getReviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function addReview(Review $review): void
    {
        $this->reviews()->save($review);
    }

    public function removeReview(Review $review): void
    {
        $this->reviews()->detach($review);
    }
}

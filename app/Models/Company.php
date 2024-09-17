<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

/**
 * COMPANY ATTRIBUTES
 * $this->attributes['id'] - int - contains the company primary key (id)
 * $this->attributes['name'] - string - contains the company name
 * $this->attributes['address'] - string - contains the company address
 * $this->attributes['user_id'] - int - contains the user ID of the company's owner
 * $this->attributes['created_at'] - timestamp - contains the creation date
 * $this->attributes['updated_at'] - timestamp - contains the last update date
 * $this->user - User - contains the associated User (that owns this company)
 * $this->games - Game[] - contains the associated games
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'user_id'];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
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

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getCreatedAt(): ?string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): ?string
    {
        return $this->attributes['updated_at'];
    }
}
<?php

// Esteban

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Company extends Model
{
    use HasFactory;

    /**
     * COMPANY ATTRIBUTES
     * $this->attributes['id'] - int - contains the company primary key (id)
     * $this->attributes['name'] - string - contains the company name
     * $this->attributes['address'] - string - contains the company address
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date
     * $this->user - CustomUser - contains the associated CustomUser (owner). (Foreign key)
     * $this->games - Game[] - contains the associated games. (Foreign key)
     */
    protected $guarded = ['id'];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'user_id' => 'required|exists:custom_users,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
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

    public function getCreatedAt(): ?string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): ?string
    {
        return $this->attributes['updated_at'];
    }

    // Foreign key
    public function customUser(): BelongsTo
    {
        return $this->belongsTo(CustomUser::class, 'custom_user_id');
    }

    public function getCustomUser(): ?CustomUser
    {
        return $this->customUser()->first();
    }

    public function setCustomUser(CustomUser $customUser): void
    {
        $this->customUser()->associate($customUser);
    }

    // Foreign key
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function getGames(): Collection
    {
        return $this->games()->get();
    }

    public function addGame(Game $game): void
    {
        $this->games()->save($game);
    }

    public function removeGame(Game $game): void
    {
        $this->games()->detach($game);
    }
}

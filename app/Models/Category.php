<?php

// Jonathan

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['name'] - string - contains the category name
     * $this->attributes['description'] - string - contains the category description
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date
     * $this->games - Game[] - contains the games associated with the category. (Foreign key)
     */
    protected $guarded = ['id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
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

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
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
    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_category');
    }

    public function getGames(): Collection
    {
        return $this->games()->get();
    }

    public function addGame(Game $game): void
    {
        $this->games()->attach($game);
    }

    public function removeGame(Game $game): void
    {
        $this->games()->detach($game);
    }
}

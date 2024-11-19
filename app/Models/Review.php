<?php

// Esteban

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Review extends Model
{
    use HasFactory;

    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['rating'] - int - contains the review rating
     * $this->attributes['comment'] - string - contains the review comment
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date
     * $this->customUser - CustomUser - contains the associated CustomUser. (Foreign key)
     * $this->game - Game - contains the associated Game. (Foreign key)
     */
    protected $guarded = ['id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|max:500',
            'game_id' => 'required|exists:games,id',
            'custom_user_id' => 'required|exists:custom_users,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating(int $rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getComment(): string
    {
        return $this->attributes['comment'];
    }

    public function setComment(string $comment): void
    {
        $this->attributes['comment'] = $comment;
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
        return $this->belongsTo(CustomUser::class);
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
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function getGame(): ?Game
    {
        return $this->game()->first();
    }

    public function setGame(Game $game): void
    {
        $this->game()->associate($game);
    }
}

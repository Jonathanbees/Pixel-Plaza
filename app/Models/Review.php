<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Review extends Model
{
    use HasFactory;

    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['rating'] - int - contains the review rating
     * $this->attributes['comment'] - string - contains the review comment
     * $this->attributes['client'] - string - contains the client name
     * $this->attributes['game'] - string - contains the game name
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date
     */
    protected $guarded = ['id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|max:500',
            'game' => 'required',
            'client' => 'required',
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

    public function getClient(): string
    {
        return $this->attributes['client'];
    }

    public function setClient(string $client): void
    {
        $this->attributes['client'] = $client;
    }

    public function getGame(): string
    {
        return $this->attributes['game'];
    }

    public function setGame(string $game): void
    {
        $this->attributes['game'] = $game;
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

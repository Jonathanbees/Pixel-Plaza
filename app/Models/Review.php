<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     */
    protected $fillable = ['rating', 'comment', 'client', 'game'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getComment(): string
    {
        return $this->attributes['comment'];
    }

    public function setComment($comment): void
    {
        $this->attributes['comment'] = $comment;
    }

    public function getClient(): string
    {
        return $this->attributes['client'];
    }

    public function setClient($client): void
    {
        $this->attributes['client'] = $client;
    }

    public function getGame(): string
    {
        return $this->attributes['game'];
    }

    public function setGame($game): void
    {
        $this->attributes['game'] = $game;
    }
}

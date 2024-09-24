<?php

// Esteban

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Game extends Model
{
    use HasFactory;

    /**
     * GAME ATTRIBUTES
     * $this->attributes['id'] - int - contains the game primary key (id)
     * $this->attributes['name'] - string - contains the game name
     * $this->attributes['image'] - string - contains the game image URL
     * $this->attributes['price'] - float - contains the game price
     * $this->attributes['description'] - string - contains the game description
     * $this->attributes['reviewsSum'] - float - contains the sum of the reviews' ratings
     * $this->attributes['reviewsCuantity'] - int - contains the number of reviews
     * $this->attributes['balance'] - string - contains the balance information
     * $this->attributes['balanceDate'] - timestamp - contains the balance date
     * $this->attributes['balanceReviewsCount'] - int - contains the count of balance reviews
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date
     * $this->company - Company - contains the associated Company that owns the game
     * $this->reviews - Review[] - contains the reviews associated with the game
     */
    protected $guarded = ['id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'company_id' => 'required|exists:companies,id',
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

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getReviewsSum(): ?float
    {
        return $this->attributes['reviewsSum'] ?? null;
    }

    public function setReviewsSum(float $reviewsSum): void
    {
        $this->attributes['reviewsSum'] = $reviewsSum;
    }

    public function getReviewsCuantity(): ?int
    {
        return $this->attributes['reviewsCuantity'] ?? null;
    }

    public function setReviewsCuantity(int $reviewsCuantity): void
    {
        $this->attributes['reviewsCuantity'] = $reviewsCuantity;
    }

    public function getBalance(): ?string
    {
        return $this->attributes['balance'] ?? null;
    }

    public function setBalance(string $balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    public function getBalanceDate(): ?string
    {
        return $this->attributes['balanceDate'] ?? null;
    }

    public function setBalanceDate(?string $balanceDate): void
    {
        $this->attributes['balanceDate'] = $balanceDate;
    }

    public function getBalanceReviewsCount(): ?int
    {
        return $this->attributes['balanceReviewsCount'] ?? null;
    }

    public function setBalanceReviewsCount(int $balanceReviewsCount): void
    {
        $this->attributes['balanceReviewsCount'] = $balanceReviewsCount;
    }

    public function getCreatedAt(): ?string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): ?string
    {
        return $this->attributes['updated_at'];
    }

    public function getCompany(): BelongsTo
    {
        return $this->belongsTo(Company::class);
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

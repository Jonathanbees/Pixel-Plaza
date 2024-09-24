<?php

// Esteban

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['total_price'] - float - contains the total price of the order
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date
     * $this->customUser - CustomUser - contains the associated CustomUser
     * $this->items - Item[] - contains the items associated with the order
     */
    protected $guarded = ['id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'total_price' => 'required|numeric|min:0',
            'custom_user_id' => 'required|exists:custom_users,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTotalPrice(): float
    {
        return $this->attributes['total_price'];
    }

    public function setTotalPrice(float $totalPrice): void
    {
        $this->attributes['total_price'] = $totalPrice;
    }

    public function getCreatedAt(): ?string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): ?string
    {
        return $this->attributes['updated_at'];
    }

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

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items()->get();
    }

    public function addItem(Item $item): void
    {
        $this->items()->save($item);
    }

    public function removeItem(Item $item): void
    {
        $this->items()->detach($item);
    }
}
<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property int $stock
 * @property float $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Collection|Order[] $orders
 * @property-read int|null $orders_count
 * @property-read Collection|ProductSale[] $sales
 * @property-read int|null $sales_count
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt( $value )
 * @method static Builder|Product whereDeletedAt( $value )
 * @method static Builder|Product whereId( $value )
 * @method static Builder|Product whereName( $value )
 * @method static Builder|Product wherePrice( $value )
 * @method static Builder|Product whereStock( $value )
 * @method static Builder|Product whereUpdatedAt( $value )
 * @mixin Eloquent
 */
class Product extends Model
{
  protected $fillable = [
    'name',
    'price',
    'stock'
  ];

  public function sales(): HasMany
  {
    return $this->hasMany(ProductSale::class);
  }

  public function orders(): HasManyThrough
  {
    return $this->hasManyThrough(Order::class, ProductSale::class);
  }

  public function cart(): HasOne
  {
    return $this->hasOne(Cart::class);
  }
}

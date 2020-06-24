<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProductSale
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $quantity
 * @property float $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Order $order
 * @property-read Product $product
 * @method static Builder|ProductSale newModelQuery()
 * @method static Builder|ProductSale newQuery()
 * @method static Builder|ProductSale query()
 * @method static Builder|ProductSale whereCreatedAt( $value )
 * @method static Builder|ProductSale whereId( $value )
 * @method static Builder|ProductSale whereOrderId( $value )
 * @method static Builder|ProductSale wherePrice( $value )
 * @method static Builder|ProductSale whereProductId( $value )
 * @method static Builder|ProductSale whereQuantity( $value )
 * @method static Builder|ProductSale whereUpdatedAt( $value )
 * @mixin Eloquent
 */
class ProductSale extends Model
{
  protected $fillable = [
    'quantity',
    'price',
    'total'
  ];

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }

  public function order(): BelongsTo
  {
    return $this->belongsTo(Order::class);
  }
}

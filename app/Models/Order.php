<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $order_id
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|ProductSale[] $productSales
 * @property-read int|null $product_sales_count
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCreatedAt( $value )
 * @method static Builder|Order whereId( $value )
 * @method static Builder|Order whereOrderId( $value )
 * @method static Builder|Order whereStatus( $value )
 * @method static Builder|Order whereUpdatedAt( $value )
 * @mixin Eloquent
 */
class Order extends Model
{
  protected $fillable = [
    'status',
    'total'
  ];

  public function productSales(): HasMany
  {
    return $this->hasMany(ProductSale::class);
  }
}

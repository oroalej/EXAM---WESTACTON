<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class IsQuantityExceededStock implements Rule
{
  private $product;

  public function __construct( Product $product )
  {
    $this->product = $product;
  }

  public function passes( $attribute, $value ): bool
  {
    return $this->product->stock >= (int) $value;
  }

  public function message()
  {
    return "<b>{$this->product->name}'s</b> quantity may not be greater than <b>{$this->product->stock}</b>";
  }
}

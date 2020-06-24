<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Rules\IsQuantityExceededStock;
use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    $product = $this->isMethod("POST")
      ? Product::findOrFail((int) $this->request->get('id'))
      : $this->cart->product;

    return [
      'quantity' => [
        new IsQuantityExceededStock($product),
        'min:1',
        'required'
      ]
    ];
  }
}

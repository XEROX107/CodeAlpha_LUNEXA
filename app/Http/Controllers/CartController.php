<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the authenticated user's cart.
     */
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $cart->load('items.product');

        return view('cart.index', compact('cart'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        // Prevent adding unpublished products.
        abort_unless($product->status, 404);

        // Check product availability.
        if ($product->stock < 1) {
            return back()->withErrors([
                'quantity' => 'This product is currently out of stock.',
            ]);
        }

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        $currentQuantity = $item
            ? (int) $item->quantity
            : 0;

        $requestedTotal = $currentQuantity
            + (int) $validated['quantity'];

        // Prevent the cart quantity from exceeding available stock.
        if ($requestedTotal > (int) $product->stock) {
            return back()->withErrors([
                'quantity' => "Only {$product->stock} unit(s) are available. "
                    . "You already have {$currentQuantity} in your cart.",
            ]);
        }

        if ($item) {
            $item->update([
                'quantity' => $requestedTotal,
            ]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => (int) $validated['quantity'],
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Product added to cart.');
    }

    /**
     * Update the quantity of a cart item.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cartItem->loadMissing(['cart', 'product']);

        // Ensure the cart item belongs to the authenticated user.
        abort_unless(
            $cartItem->cart &&
                (int) $cartItem->cart->user_id === (int) auth()->id(),
            404
        );

        $product = $cartItem->product;

        // Prevent updates to unavailable products.
        abort_unless($product && $product->status, 404);

        // Validate the requested quantity against current stock.
        if ((int) $validated['quantity'] > (int) $product->stock) {
            return back()->withErrors([
                'quantity' => "Only {$product->stock} unit(s) are currently available.",
            ]);
        }

        $cartItem->update([
            'quantity' => (int) $validated['quantity'],
        ]);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Cart updated.');
    }

    /**
     * Remove a cart item.
     */
    public function remove(CartItem $cartItem)
    {
        $cartItem->loadMissing('cart');

        // Ensure the cart item belongs to the authenticated user.
        abort_unless(
            $cartItem->cart &&
                (int) $cartItem->cart->user_id === (int) auth()->id(),
            404
        );

        $cartItem->delete();

        return redirect()
            ->route('cart.index')
            ->with('success', 'Product removed from cart.');
    }
}

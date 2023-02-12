<?php

namespace App\Http\Livewire\Frontend\Checkout\CheckoutShow;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Stock;
use Livewire\Component;
use Illuminate\Support\Str;

class Php extends Component
{
    public $cart, $totalProductAmount = 0, $totalProductCount = 0;
    public $name, $email, $phone, $address, $payment_method = null;

    // this function is to get the total amount inside the cart
    public function totalProductAmount(){
        if(auth()->user()){
        $this->cart = session('cart');
        foreach($this->cart as $cartItem) {
            $this->totalProductAmount += $cartItem['product_price'] * $cartItem['quantity'];}
        }
            return $this->totalProductAmount;
    }   

    // public function totalProductCount(){
    //     if(auth()->user()){
    //         $this->cart = session('cart');
            
    //         foreach($this->cart as $cartItem){
    //             $this->totalProductCount += $cartItem['quantity'];
    //         }
    //     }
    //     return $this->totalProductCount;
    // }


    public function rules(){
        return [
            'name' => 'string|max:121',
            'email' => 'email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'address' => 'required|string|max:500',
        ];
    }


    public function placeOrder(){

        $this->validate();

        $userID = auth()->user()->id;

        $order = Order::create([
            
            'order_number' => 'HC-'.$userID.Str::random(10),
            'user_id' => $userID, 
            'status' => 'pending', 
            'grand_total' => $this->totalProductAmount,
            'item_count' => $this->totalProductCount, 
            'payment_status',
            'payment_method' => $this->payment_method,
            'name'=> $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,

        ]);

        
        foreach ($this->cart as $cartItem) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                    'price' => $cartItem['product_price']


                ]);

                $this->totalProductCount += $cartItem['quantity'];
                $this->totalProductAmount += $cartItem['product_price'];

                Stock::where('product_name', $cartItem['product_name'])->decrement('stock_prod_qty', $cartItem['quantity']);
            }
            
            return $order;
    }

    public function codOrder(){
        $this->payment_method = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if($codOrder){
            
            session()->forget('cart');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Place Successfull.',
                'type' => 'success',
                'status' => 200
            ]);
            
            return redirect()->to('thank-you');
            

        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong.',
                'type' => 'success',
                'status' => 500
            ]);

        }

    }

    public function render()
    {
        $user = auth()->user();
        if(isset($user) == null){
            return view('auth.login');
        }
        $this->name = $user->name;
        $this->email = $user->email;

        // assigning total cart amount by calling the public function so that we can use it in the view
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show.php', [
            'totalCartAmount' => $this->totalProductAmount,
            'user' => $user
        ]);
    }
}

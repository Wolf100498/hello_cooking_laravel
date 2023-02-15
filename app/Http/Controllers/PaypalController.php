<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    public function Index()
    {
        $user = auth()->user();

        if(!$user){
            return view('frontend.fallback.error-404');
        }

        return view('frontend.checkoutCart', [
                'user' => $user,
                'cartItems' => session('cart'),
                'totalCartAmount' => $this->totalAmount(),
            ]);
    }

    public function RequestPayment(Request $request)
    {
        if(!Auth::check()){
            return view('frontend.fallback.error-404');
        }
        if($request->mode == 'CashOnDelivery'){
            $totalProductCount = 0;
            $totalProductAmount = 0;
            $userID = Auth::user()->id;
            $itemCount = $this->totalItemsCount();
            $cart = session()->get('cart');
            $order = Order::create([
                'order_number' => 'HC-'.$userID.Str::random(10),
                'user_id' => $userID, 
                'status', 
                'grand_total' => $request->grandTotal,
                'item_count' => $itemCount,
                'payment_status',
                'payment_method' => 'Cash on Delivery',
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'notes' => $request->notes
            ]);

            foreach ($cart as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                    'price' => $cartItem['product_price']
                ]);
                $totalProductCount += $cartItem['quantity'];
                $totalProductAmount += $cartItem['product_price'];
            }
    
            session()->forget('cart');
            return redirect('/')->with('message', 'Placing order successful');
            exit();
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paymentsuccess'),
                "cancel_url" => route('paymentCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "value" => "$request->grandTotal",
                        "currency_code" => "PHP"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    // dd($links['href']);
                $reciever = session()->get('reciever');

                if(!$reciever) {
                    $reciever = [
                        "name" => $request->name,
                        'email' => $request->email,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'notes' => $request->notes,
                        'grandTotal' => $request->grandTotal
                    ];
                    session()->put('reciever', $reciever);
                }
                if(isset($reciever)) {
                    $reciever = [
                        "name" => $request->name,
                        'email' => $request->email,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'notes' => $request->notes,
                        'grandTotal' => $request->grandTotal
                    ];
                    session()->put('reciever', $reciever);
                }


                    return redirect($links['href'])->with('message', 'Order placed successfully');
                }
            }
// b)roQT{9
            return redirect('/checkout')
                ->with('danger', 'Something went wrong1.');
        } else {
            return redirect('/checkout')
                ->with('danger', $response['message'] ?? 'Something went wrong2.');
        }
    }

    public function PaymentSuccess(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        // dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            
            $userID = Auth::user()->id;
            $itemCount = $this->totalItemsCount();
            $reciever = session()->get('reciever');
            $cart = session()->get('cart');
        

        $order = Order::create([
            'order_number' => 'HC-'.$userID.Str::random(10),
            'user_id' => $userID, 
            'status', 
            'grand_total' => $reciever['grandTotal'],
            'item_count' => $itemCount,
            'payment_status',
            'payment_method' => 'Paypal',
            'name' => $reciever['name'],
            'email' => $reciever['email'],
            'address' => $reciever['address'],
            'phone' => $reciever['phone'],
            'notes' => $reciever['notes']
        ]);

        foreach ($cart as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['product_price']
            ]);


            // Stock::where('product_name', $cartItem['product_name'])->decrement('stock_prod_qty', $cartItem['quantity']);
        }



        session()->forget('cart');
        session()->forget('reciever');



            return redirect()
                ->route('home')
                ->with('success', 'You have successfully created an order.');
        } else {
            return redirect()
                ->route('paymentindex')
                ->with('error', $response['message'] ?? 'Something went wrong3.');
        }
    }

    public function PaymentCancel()
    {
        return redirect()
            ->route('paymentindex')
            ->with('error', $response['message'] ?? 'You have cancelled the transaction.');
    }


    private function totalItemsCount(){
        $cartItems= session()->get('cart');
        $totalItemsCount = 0;
        foreach($cartItems as $cartItem){
            $totalItemsCount += $cartItem['quantity'];
        }
        return $totalItemsCount;
    }



    private function totalAmount(){
        $cartItems= session()->get('cart');
        
        $totalAmount = 0;

        foreach($cartItems as $cartItem){
            $product = $cartItem['product_price'] * $cartItem['quantity'];
            $totalAmount += $product;
        }
        return $totalAmount;
    }
}

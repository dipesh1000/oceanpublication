<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Repositories\RepoCourse\CourseRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public $course;
    public function __construct(CourseRepository $course)
    {
        $this->course = $course;
    }
    public function index()
    {
        return view('userdashboard.orders.index');
    }
    public function store(Request $request)
    {
        $user = Sentinel::getUser();
        $carts = Cart::content();
        $count = count($carts);
        if($count > 0) {
            foreach ($carts as $cart) { 
                try {
                $order = new Order();
                $order->user_id = $user->id;
                $order->purchaseble_id = $cart->id;
                $order->purchaseble_type = get_class(getCoursesByType($cart));
                $order->order_date = Carbon::now()->toDateTimeString();
                $order->price = getCoursesByType($cart)->price;
                $order->payment_method = 'Cash';
                $order->status = 'Active';
                $checkout = $order->save();
                    if($checkout == true){
                        Cart::destroy($cart->rowId);
                    }
                    if(!$request->ajax()){
                        return redirect()->back()->with( 'success', 'Course Checkout Successfully' );
                    }
                    return response()->json( [
                        'status'  => 'success',
                        'message' => 'Course Checkout Successfully.'
                    ], 200 );
                }
                catch (\Exception $e) {
                    return redirect()->back()->with('errors', 'Error While Checkout');
                }
            }
        }
        
    }
}

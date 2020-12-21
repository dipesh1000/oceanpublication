<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Model\MasterOrder;
use App\Model\Order;
use App\Repositories\RepoCourse\CourseRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        $user = Sentinel::getUser();
        $carts = Cart::content();
        $count = count($carts);
        $totalPrice = $request->ttlPrice;
        $courses = [];
        try {
            $masterOrder = new MasterOrder();
            $masterOrder->user_id = $user->id;
            $masterOrder->invoice_no = $user->id.time();
            $masterOrder->status = MasterOrder::STATUS_ACTIVE;
            $masterOrder->grandTotal = $totalPrice;
            $masterOrder->payment_method = 'Esewa';
            $masterOrder->save();
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->with('errors', 'Error While Checkout');
        }
        if($count > 0) {
            try {
                foreach ($carts as $cart) { 
                    $order = new Order();
                    $order->purchaseble_id = $cart->id;
                    $order->master_order_id = $masterOrder->id;
                    $order->purchaseble_type = get_class(getCoursesByType($cart));
                    $order->order_date = Carbon::now()->toDateTimeString();
                    $order->price = getCoursesByType($cart)->price;
                    $checkout = $order->save();
                    $courses[] = $order; 
                        if($checkout == true){
                            Cart::destroy($cart->rowId);
                        }
                        // return response()->json( [
                            //     'status'  => 'success',
                            //     'message' => 'Course Checkout Successfully.'
                            // ], 200 );
                    }  
                    DB::commit();
                    return view('UserDashboard.order.checkout', compact('courses', 'masterOrder'));
                    }catch (\Throwable $e) {
                        DB::rollback();
                        return redirect()->back()->with('errors', 'Error While Checkout');
                    }
                   
        }
        
    }
}

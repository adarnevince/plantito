<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;

use DB;
use Session;

class ShopController extends Controller
// ---- USER SIDE ---- //
{
    public function showShop(){
        $prodlist = Product::query()
        ->select(DB::raw('*'))
        ->where('stock', '>', '0')
        ->paginate(6);

        return view('shop', compact('prodlist'));
      
    }

    public function addOrder(Request $request)
    {
        if (Session::has('user_id')){
    
        $product = Product::query()
        ->select('product_id', 'name', 'price', 'image', 'stock')
        ->where('stock', '>', '0')
        ->get();

        $added_item = array();
        $total = 0;
        for ($i = 0; $i < count($product); $i++) {
            if (intval($request->input('order_' . str($product[$i]->product_id))) > 0) {
                $total += $product[$i]->price * $request->input('order_' . str($product[$i]->product_id));
            }
            array_push($added_item, $request->input('order_' . str($product[$i]->product_id)));
        }
        return view('shop_cart', compact('product', 'added_item', 'total', 'request'));

        } else {
            return redirect('/login')->with('fail', 'You need to sign up/login first!');
        }
    }

    public function placeOrder(Request $request){
        $order = new Order;
        $order->user_id = Session::get('user_id');
        $order->save();

        $p = Product::query()
        ->select('product_id','name', 'price', 'image')
        ->where('stock', '>', '0')
        ->get();

        for($i = 0; $i < count($p); $i++){
            $ordered = $request->input('order_' . str($p[$i]->product_id));
            if ($ordered > 0) {
                $po = new ProductOrder();
                $po->order_id = $order->order_id;
                $po->product_id = $p[$i]->product_id;
                $po->quantity = $ordered;
                $po->save();
            }
        }

        if (Session::get('role') == 'user'){
        return view('shop_ordered', compact('order'));
        } else {
            abort(401);
        }
    }

    public function showOrder(){
        $orders = Order::query()
        ->select('orders.order_id', 'time_placed', 'status', DB::raw('SUM(price * quantity) AS total_price'))
        ->join('product_orders', 'product_orders.order_id', '=', 'orders.order_id')
        ->join('product', 'product_orders.product_id', '=', 'product.product_id')
        ->where('user_id', '=', Session::get('user_id'))
        ->where('status', '!=', 'Cancelled')
        ->where('status', '!=', 'Received')
        ->groupBy('orders.order_id')
        ->orderBy('time_placed', 'DESC')
        ->paginate(10);

        if (Session::get('role') == 'user'){
        return view('orders', compact('orders'));
        }
        else {
            abort(401);
        }
    }

    public function OrderShow(string $id){
        $check_order = Order::query()
        ->select('order_id')
        ->where('order_id', '=', $id)
        ->where('user_id', '=', Session::get('user_id'))
        ->get();

        if (count($check_order) > 0) {
            $total = 0;
            $order_info = Order::query()
            ->select('order_id', 'time_placed', 'status')
            ->where('order_id', '=', $id)
            ->get()
            ->first();

            $ordered_products = Order::query()
            ->select('orders.order_id', 'quantity', 'name', 'price', 'image')
            ->join('product_orders', 'orders.order_id', '=', 'product_orders.order_id')
            ->join('product', 'product_orders.product_id', '=', 'product.product_id')
            ->where('orders.order_id', '=', $id)
            ->get();

            foreach($ordered_products as $op) {
                $total += $op->price * $op->quantity;
            }

            if (Session::get('role') == 'user'){
            return view('order_show', compact('order_info', 'ordered_products', 'total'));
            }
            else {
                abort(401);
            }
        } else {
            abort(401);
        }
    }

    public function CompletedOrders()
    {
        $orders = Order::query()
        ->select('orders.order_id', 'user_id', 'time_placed', 'status', DB::raw("SUM(price * quantity) AS total_price"))
        ->join('product_orders', 'product_orders.order_id', '=', 'orders.order_id')
        ->join('product', 'product_orders.product_id', '=', 'product.product_id')
        ->where('user_id', '=', Session::get('user_id'))
        ->where('status', '=', 'Received')
        ->orWhere('status', '=', 'Cancelled')
        ->groupBy('orders.order_id')
        ->orderBy('status', 'DESC')
        ->orderBy('time_placed', 'DESC')
        ->get();

        if (Session::get('role') == 'user'){
        return view('completed_orders', compact('orders'));
        }
        else {
            abort(401);
        }
    }

    public function cancelOrder(string $id)
    {
        Order::where('order_id', '=', $id)->update([
            'status' => 'Cancelled'
        ]);
        return redirect('/completed-orders')->with('success', 'Order cancelled.');
    }

    public function receiveOrder(string $id){
        Order::where('order_id', '=', $id)->update(
            [
                'status' => 'Received'
            ]
            );

            return redirect('/orders')->with('success', 'Thank you for ordering. Time to plant happiness in your home!');
    }

    // ---- ADMIN ---- //

    public function showOngoingOrders(){
        $orders = Order::query()
        ->select('orders.order_id', 'user_id', 'time_placed', 'status', DB::raw("SUM(price) AS total_price"))
        ->join('product_orders', 'product_orders.order_id', '=', 'orders.order_id')
        ->join('product', 'product_orders.product_id', '=', 'product.product_id')
        ->where('status', '!=', 'Received')
        ->where('status', '!=', 'Cancelled')
        ->groupBy('orders.order_id')
        ->orderBy('time_placed', 'DESC')
        ->paginate(10);

        if (Session::get('role') == 'admin'){
        return view('admin_orders', compact('orders'));
        } else {
            abort(401);
        }
    }

    public function showCompletedOrders(){
        $orders = Order::query()
        ->select('orders.order_id', 'user_id', 'time_placed', 'status', DB::raw("SUM(price) AS total_price"))
        ->join('product_orders', 'product_orders.order_id', '=', 'orders.order_id')
        ->join('product', 'product_orders.product_id', '=', 'product.product_id')
        ->where('status', '=', 'Received')
        ->orWhere('status', '=', 'Cancelled')
        ->groupBy('orders.order_id')
        ->orderBy('time_placed', 'DESC')
        ->get();

        if (Session::get('role') == 'admin'){
        return view('admin_orders_completed', compact('orders'));
        } else {
            abort(401);
        }
    }

    public function showOrderInfo(string $id){
        $total = 0;
        $order_info = Order::query()
        ->select('order_id', 'time_placed', 'status')
        ->where('order_id', '=', $id)
        ->get()
        ->first();

        $ordered_products = Order::query()
        ->select('orders.order_id', 'quantity', 'name', 'price', 'image', 'stock')
        ->join('product_orders', 'orders.order_id', '=', 'product_orders.order_id')
        ->join('product', 'product_orders.product_id', '=', 'product.product_id')
        ->where('orders.order_id', '=', $id)
        ->get();
        foreach ($ordered_products as $op) {
            $total += $op->price * $op->quantity;
        }

        if (Session::get('role') == 'admin'){
        return view('admin_show_order', compact('order_info', 'ordered_products', 'total'));
        }
        else {
            abort(401);
        }
    }

    public function acceptOrder(string $id){
        $ordered_products = Order::query()
        ->select('orders.order_id', 'quantity', 'name', 'price', 'image')
        ->join('product_orders','orders.order_id', '=', 'product_orders.order_id')
        ->join('product', 'product_orders.product_id','=', 'product.product_id')
        ->where('orders.order_id', '=', $id)
        ->get();

        $ops = DB::select('SELECT `orders`.`order_id`, `product`.`product_id`, `quantity`, `name`, `price`, `image`, `stock` FROM `orders` INNER JOIN `product_orders` ON `orders`.`order_id` = `product_orders`.`order_id` INNER JOIN `product` ON `product_orders`.`product_id` = `product`.`product_id` WHERE `orders`.`order_id` = ' . $id . ' AND `quantity` <= stock;');

        if (count($ordered_products) == count($ops)){
            for ($i = 0; $i < count($ops); $i++){
                Product::where('product_id', '=', $ops[$i]->product_id)
                ->update(
                    [
                        'stock' => $ops[$i]
                        ->stock - $ops[$i]
                        ->quantity
                    ]
                    );
            }
            Order::where('order_id', '=', $id)
            ->update(
                [
                    'status' => 'Accepted'
                ]
            );
            return redirect('/admin-UserOrders')->with('success', 'Order Accepted!');
        } else {
            return redirect('/admin-UserOrders')->with('fail', 'Insufficient stock to complete order!');
        }
    }
    
    public function AdminCancelOrder(string $id){
        Order::where('order_id', '=', $id)->update(
            [
                'status' => 'Cancelled'
            ]
            );
            return redirect('/admin-UserOrders')->with('success', 'Order Cancelled');
    }

    public function updateOrder(Request $request, string $id){
        Order::where('order_id', '=', $id)->update(
            [
                'status' => $request->input('new_status')
            ]
            );
            return redirect('/admin-UserOrders')->with('success', 'Order Updated');
    }
}

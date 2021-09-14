<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Offer;

use App\Models\Order;
use App\Models\Incoterm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Repositories\OrderRepository;
use Yajra\Datatables\Facades\Datatables;

class OrdersController extends Controller
{

    public $orderRepository;
    /**
     * 
     * Set Locale en
     * Create a new controller instance.
     * Create public repository.
     *
     * @return void
     */
    public function __construct(OrderRepository $orderRepository){
        // Set Locale
        if(request()->has("lang")){
            App::setLocale(request()->get("lang"));
        }
        $this->middleware('auth');
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $data = [
            "data" => Order::all(),
            "incoterms" => Incoterm::all(),
        ];
        
        return view('orders.index')->with($data);
        */
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("orders.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Handling in OrderRepository Class
        if($this->orderRepository->store($request)){
            $request->session()->flash('success', 'შეკვეთა წარმატებით დაემატა!');
            return redirect()->route('orders.index');
        }else{
            $request->session()->flash('error', 'ჩანაწერი ვერ დაემატა!');
            return redirect()->route('orders.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('orders.show')->with(["order" => $this->orderRepository->show($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get The Order
        $order = Order::findOrFail($id)->format();

        // Return View
        return view('orders.edit')->with(["order" => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Handling in OrderRepository Class
        if($this->orderRepository->update($request, $id)){
            $request->session()->flash('success', 'შეკვეთა წარმატებით განახლდა!');
            return redirect()->route('orders.index');
        }else{
            $request->session()->flash('error', 'ჩანაწერი ვერ განახლდა!');
            return redirect()->route('orders.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

    /**
     * Create Offer in storage
     * 
     * @param int $id
     * @return View
     */
    public function create_offer($id)
    {
        // Get The Order
        $order = Order::findOrFail($id);

        // Generate Offer Type
        if(Auth::user()->hasRole("procurment"))
        {
            $type = "p_offer";
        }
        elseif(Auth::user()->hasRole("logistic"))
        {
            $type = "l_offer";
        }
        else // Return Index with Error Message
        {
            $request->session()->flash("error", "თქვენ არ გაქვთ შეთავაზების დამატების უფლება");
            return view('orders.index');
        }
        // Create The Offer
        if($order->offers()->create(["type"=>$type,"user_id"=>Auth::id()]))
        {
            // Update Order Status To Pending
            $order->update(["status_id" => "2"]);
            // Return To Show View
            return view('orders.edit')->with(["order" => $this->orderRepository->show($id)]);
        }
    }

    /**
     * Update the Offer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_offer(Request $request, $id)
    {
        // Get The Offer
        $offer = Offer::findOrFail($id);
        // Collect Update Data
        $data = [
            "user_id" => Auth::id(),
            "incoterm_id" => $request->incoterm_id,
            "currency_id" => $request->currency_id,
            "price" => $request->price,
            "description" => $request->description,
            "city" => $request->city,
            "days" => $request->days,
            "active" => ($request->active) ? 1 : 0,
            "active_days" => $request->active_days,
        ];
        // Update Offer
        $success = $offer->update($data);
        // Check if All types of Offers are Active
        if(count($offer->order->offers->where("active", 1)) == count($offer->order->offers) && count($offer->order->offers) > 1)
        {
            // Update Order Status To Ready
            $offer->order->update(["status_id" => 3]);
        }else{
            // Update Order Status To Pending
            $offer->order->update(["status_id" => 2]);
        }
        // Flash Session
        $this->flash_session( $request, $success );
        // Redirect to Main View of Orders
        return redirect()->route('orders.index');
    }

    /**
     * Flash Session After Database Trigger.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  boolean  $success
     * @param  array  $data
     * @return Session::flash
     */
    public function flash_session($request, $success){
        // Generate Message and Key depending on $success Boolean
        $message = "შესყიდვის შეთავაზება წარმატებით განახლდა!";
        $key = "success";
        if(!$success){
            $message = "უცნობი შეცდომა, შესყიდვის შეთავაზება ვერ განახლდა!";
            $key = "error";
        }
        // Return Updated Session
        return $request->session()->flash($key, $message);
    }
    /**
     * 
     * Change Order Status To Sell
     * Define Deadlines
     * 
     * @param int $id
     * @return Session::flash
     */
    public function sell($id){
        // Get The Order
        $order = Order::findOrFail($id);
        if($order->status_id == 3){
            // Change The Status
            $order->status_id = 4; // Sell The Order
            $order->deadlines()->where("deadline_type", "MANUFACTURING")->first()->deadline = "2012-12-12";
            $order->deadlines()->where("deadline_type", "TRANSPORTATION")->first()->deadline = "2012-12-13";
            $order->deadlines()->where("deadline_type", "ORDER_HANDLING")->first()->deadline = "2012-12-14";

            // Save Order
            $order->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
 
    public function manufacturing_start($id){
        // Get The Order
        $order = Order::findOrFail($id);
        if($order->status_id == 4){
            // Change The Status
            $order->status_id = 5; // Sell The Order

            // Save Order
            $order->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
    public function manufacturing_end($id){
        // Get The Order
        $order = Order::findOrFail($id);
        if($order->status_id == 5){
            // Change The Status
            $order->status_id = 6; // Sell The Order

            // Save Order
            $order->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
    public function manufacturing_out($id){
        // Get The Order
        $order = Order::findOrFail($id);
        if($order->status_id == 6){
            // Change The Status
            $order->status_id = 7; // Sell The Order

            // Save Order
            $order->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
    public function transportation_start($id){
        // Get The Order
        $order = Order::findOrFail($id);
        if($order->status_id == 7){
            // Change The Status
            $order->status_id = 8; // Sell The Order

            // Save Order
            $order->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
    public function transportation_end($id){
        // Get The Order
        $order = Order::findOrFail($id);
        if($order->status_id == 8){
            // Change The Status
            $order->status_id = 9; // Sell The Order

            // Save Order
            $order->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
    public function transportation_out($id){
        // Get The Order
        $order = Order::findOrFail($id);
        if($order->status_id == 9){
            // Change The Status
            $order->status_id = 10; // Sell The Order

            // Save Order
            $order->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
}

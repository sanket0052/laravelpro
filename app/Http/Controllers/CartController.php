<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Brand;
use App\User;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;

class CartController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainMenu = new HomeController();
        $cartdata = $this->cartdata();
        $cartarray = $cartdata['cartproduct'];
        $total = $cartdata['total'];

        $mainMenu = $mainMenu->frontendMenu();
        return view('cart')
            ->with('mainMenu', $mainMenu)
            ->with('cartarray', $cartarray)
            ->with('total', $total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('auth/userlogin');
        }
        $product_id = $request->product_id;
        $products = Product::with('brand')->find($product_id);
        $user = Auth::user();
        $sessiondata = session()->get('cart_session', '0');

        if($sessiondata != 0)
        {
            foreach ($sessiondata as $key => $value)
            {
                $productIdArr[] = $value['product_id'];
            }

            $allid = collect($sessiondata);
            $newid = $allid->count()+1;

            $productIdArr = collect($productIdArr);

            if(!$productIdArr->contains($products->id))
            {   
                $newsession = array(
                    'name' => $products->name,
                    'thumb' => $products->thumb,
                    'brand' => $products->brand['name'],
                    'id' => $newid,
                    'product_id' => $products->id,
                    'price' => $products->price,
                    'qty' => 1
                ); 

                $collection = collect($sessiondata);
                $collection->put(str_random(10), $newsession);
                $request->session()->put('cart_session', $collection->all());
            }
        }
        else
        {
            $cart_array[str_random(10)] = array(
                    'name' => $products->name,
                    'thumb' => $products->thumb,
                    'brand' => $products->brand['name'],
                    'id' => 1,
                    'product_id' => $products->id,
                    'price' => $products->price,
                    'qty' => 1
                ); 
            $request->session()->put('cart_session', $cart_array);
        }
        return redirect('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $rowid = $request->rowid;
        $qty = $request->qty;
        $sessiondata = $request->session()->get('cart_session', '0');
        foreach ($sessiondata as $key => $value)
        {
            if($key == $rowid)
            {
                $sessiondata[$key]['qty'] = $qty;
            }
        }
        session()->put('cart_session', $sessiondata);
        return redirect('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sessiondata = session()->get('cart_session', '0');
        foreach ($sessiondata as $key => $value)
        {
            if($value['id'] == $id)
            {
                $rowid = $key;
            }
        }
        array_forget($sessiondata, $rowid);
        if(collect($sessiondata)->isEmpty())
        {
            session()->forget('cart_session');
        }
        else
        {
            session()->put('cart_session', $sessiondata);
        }
        return redirect('cart');
    }

    public function clearcart()
    {
        session()->forget('cart_session');
        return redirect('cart');
    }

    public function cartdata()
    {
        $sessiondata = session()->get('cart_session', '0');
        if($sessiondata != 0)
        {
            $finaltotal = 0;
            foreach ($sessiondata as $key => $value)
            {
                $total = $value['qty']*$value['price'];
                $sessiondata[$key]['total'] = $total;
                $finaltotal += $total;
            }
            $cartarray = $sessiondata;
            $totalproducts = collect($cartarray);
            $totalproduct = $totalproducts->count();
            $total = array(
                'totalprice' => $finaltotal,
                'totalproduct' => $totalproduct
            );
        }
        else
        {
            $cartarray = array();
            $total = array(
                'totalprice' => 0,
                'totalproduct' => 0
            );
        }
        return array('total' => $total, 'cartproduct' => $cartarray);
    }
}
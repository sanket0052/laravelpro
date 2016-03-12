<?php

namespace App\Http\Middleware;

use Closure;

class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        view()->share('cartdata', $this->cartData());
        return $next($request);
    }

    protected function cartData()
    {
        $sessiondata = session()->get('cart_session', '0');

        if($sessiondata != 0){

            $finaltotal = 0;

            foreach ($sessiondata as $key => $value){
                $total = $value['qty']*$value['price'];
                $sessiondata[$key]['total'] = $total;
                $finaltotal += $total;
            }

            $cartarray = $sessiondata;
            $total = [
                'totalprice' => $finaltotal,
                'totalproduct' => count($sessiondata)
            ];

        }else{

            $cartarray = [];
            $total = [
                'totalprice' => 0,
                'totalproduct' => 0
            ];
        }
        return ['total' => $total, 'cartproduct' => $cartarray];
    }
}

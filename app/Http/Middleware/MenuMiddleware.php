<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class MenuMiddleware
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
        view()->share('mainMenu', $this->frontendMenu());

        return $next($request);
    }

    protected function frontendMenu()
    {
        $allcategory = Category::all();

        $count = 0;

        foreach ($allcategory as $category){
            if($category->parent_id == 0){
                $mainMenu[$count] = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'urlname' => $category->urlname
                ];
                $count++;
            }else{
                $categorySubList[$category->id] = $category->name;
            }
        }
        $count = 0;

        foreach($allcategory as $key => $value){
            if($value->parent_id != 0){
                foreach ($mainMenu as $k => $v){
                    if($value->parent_id == $v['id']){
                        $mainMenu[$k]['sub'][] = [
                            'id' => $value->id,
                            'name' => $value->name,
                            'urlname' => $value->urlname
                        ];
                        $count++;
                    }
                }
            }
        }
        return $mainMenu;
    }
}

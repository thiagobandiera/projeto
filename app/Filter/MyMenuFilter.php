<?php

namespace App\Filter;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;


class MyMenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {

    	$user = auth()->user();

    	if (isset($item['url']) && !$user->can($item['url'] . '.index')) {
    		return false;
        }
    	
        return $item;
    }
}
<?php

namespace App\Traits;
use Illuminate\Support\Facades\Cache;

trait Paginator
{
    public function paginate($list,$paginate,$cacheKey=null)
    {
        
        $count = ($cacheKey ? Cache::remember($cacheKey, 500 , function () use($list){
            return count($list->get());
        }) : count($list->get()));

        $result = $list->skip($paginate->start)->take($paginate->length)->get();

        return ['recordsTotal' => $count, 'recordsFiltered' => $count, 'data' => $result];
    }

    public function poPaginate($count,$data)
    {
        return ['recordsTotal' => $count, 'recordsFiltered' => $count, 'data' => $data];
    }

    public function paginateEmpty()
    {
        return ['recordsTotal' => 0 , 'recordsFiltered' => 0, 'data' => []];
    }
}

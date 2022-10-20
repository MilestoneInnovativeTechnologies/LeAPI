<?php

namespace Milestone\LeAPI\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function index(Request $request,$client,$action,$table){
        if($action === 'get') return $this->get($table,$request);
        if($action === 'set') return $this->set($table,$request);
        return null;
    }

    public function get($table,Request $request) {
        $query = DB::table($table);

        if($request->id){
            $ids = $request->id; $ids = explode(',',$ids);
            if(count($ids) === 1) $query = $query->where('id',$ids[0]);
            else $query = $query->whereIn('id',$ids);
        }

        if($request->has('limit')) {
            [$skip,$take] = explode(',',$request->get('limit','0,10'));
            $query = $query->skip($skip)->take($take);
        }

        if($request->has('count')) return [$query->count()];
        if($request->has('max')) return [$query->max($request->get('max','id') ?: 'id')];
        if($request->has('min')) return [$query->min($request->get('min','id') ?: 'id')];
        if($request->has('avg')) return [$query->avg($request->get('avg','id') ?: 'id')];
        if($request->has('sum')) return [$query->sum($request->get('sum','id') ?: 'id')];

        if($request->has('fields')){
            $fields = $request->get('fields','id');
            $fieldsArray = explode(',',$fields);
            return $query->get($fieldsArray);
        }
        return $query->get();
    }

    public function set(){
        return [];
    }

}

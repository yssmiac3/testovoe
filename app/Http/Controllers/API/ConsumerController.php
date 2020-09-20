<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consumer;
use App\Http\Requests\ConsumerRequest;

class ConsumerController extends Controller
{
    public function index(){
        $query = Consumer::query();
        $query->when(request()->filled('filter'), function($query){
            $filters = explode(',', request('filter'));
            foreach($filters as $filter){
                [$criteria, $value] = explode(':', $filter);
                $query->where($criteria, $value);
            }
            return $query;
        });
        return view('consumers_table', ['data' => $query->get()]);
    }

    public function show(Consumer $consumer){
        return $consumer;
    }

    public function store(ConsumerRequest $request){
        $validatedData = $request->validated();
        $consumer = Consumer::create($validatedData);
        return response()->json($consumer, 201);
    }

    public function update(ConsumerRequest $request, Consumer $consumer){
        $consumer->update($request->validated()->all());
        return response()->json($consumer, 200);
    }

    public function delete(Request $request, Consumer $consumer){
        $consumer->delete();
        return response()->json($null, 204);
    }
}
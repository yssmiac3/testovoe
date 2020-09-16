<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consumer;

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

    public function store(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:30',
            'email' => 'required|unique:consumers|min:5|max:30',
        ]);
        $consumer = Consumer::create($validatedData);
        return response()->json($consumer, 201);
    }

    public function update(Request $request, Consumer $consumer){
        $consumer->update($request->all());
        return response()->json($consumer, 200);
    }

    public function delete(Request $request, Consumer $consumer){
        $consumer->delete();
        return response()->json($null, 204);
    }
}
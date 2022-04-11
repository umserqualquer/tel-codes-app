<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\ConnectionHistory;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConnectionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connection_history = ConnectionHistory::whereUserId( auth()->user()->id )->get();

        return response()->json(['connection_history' => $connection_history]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // try {

            $request->validate([
                'origin' => 'required',
                'destiny' => 'required',
                'total_minutes' => 'required',
                'plan_id' => 'required'
            ]);

            $code = Code::where('origin', $request->origin)->where('destiny', $request->destiny)->first();
            $plan = Plan::where('id', $request->plan_id)->first();

            if($request->total_minutes > $plan->time){
                $additional_minutes = $request->total_minutes - $plan->time;
                $value = $additional_minutes * $code->value;
                $value = $value + ($value * 0.1);
            }else{
                $value = 0;
            }

            $result = ConnectionHistory::create([
                'origin' => $request->origin,
                'destiny' => $request->destiny,
                'value' => $value,
                'start_connect' => Carbon::now(),
                'end_connect' => Carbon::now()->add($request->total_minutes, 'minutes'),
                'total_minutes' => $request->total_minutes,
                'user_id' => auth()->user()->id,
                'plan_id' => $request->plan_id
            ]);

            return response()->json(['message' => 'Success!', 'data' => $result]);

        // } catch (\Throwable $th) {

        //     return response()->json(['message' => $th->getMessage()]);
        // }


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
        //
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
}

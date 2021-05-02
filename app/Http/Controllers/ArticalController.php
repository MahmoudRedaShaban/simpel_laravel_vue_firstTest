<?php

namespace App\Http\Controllers;

use App\Events\NotesEvent;
use App\Http\Requests\AreticalRequest;
use App\Models\Artical;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return All Articals
        return Artical::latest()->get();  //TODO working with pagination
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreticalRequest $request)
    {
        // add new Data
        $alldata = $request->validated();
        $alldata['user_id']=1;
        $result = Artical::create($alldata);
        // create Notes
        broadcast(new NotesEvent($request->only('title')));
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function show(Artical $artical)
    {
        //
        return $artical;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function update(AreticalRequest $request, Artical $artical)
    {
        return $artical->update($request->only('title','body'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artical $artical)
    {
        //
        if($artical->delete()){
            return response(null,200);

        }else{
            return response(null,401);
        }

    }
    /**
     * return Data by auth
     *
     * @return void
     */
    public function getDataWithAuth()
    {
        return auth()->articals->all();
    }
}

<?php

namespace Modules\EffortTracking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EffortTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('efforttracking::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('efforttracking::create');
    }

    /**
     * Show the specified resource.
     * @param int $id
     */
    public function show($id)
    {
        return view('efforttracking::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     */
    public function edit($id)
    {
        return view('efforttracking::edit');
    }

}

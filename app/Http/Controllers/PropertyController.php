<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('real-estate.index');
    }
    public function list()
    {
        $properties = Property::paginate(6);
        $paginator = $properties->render()->paginator;
        $elements = $properties->render()->elements[0];
        return view('real-estate.list')->with(['properties' => $properties, 'paginator' => $paginator, 'elements' => $elements]);
    }
    public function show(Property $property)
    {
        $userCanLike = Property::where('created_at', $property->created_at)->where('id', '<>', $property->id)->take(5)->get();
        $property->userCanLike = $userCanLike;
        return view('real-estate.show')->with('property', $property);
    }
    public function accountIndex()
    {
        return view('real-estate.account-index');
    }
    public function accountRentalResume()
    {
        return view('real-estate.account-rental-resume');
    }
}

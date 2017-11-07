<?php
/**
 * Created by PhpStorm.
 * User: Abdelqader Osama
 * Date: 05/11/17
 * Time: 21:39
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLocationRequest;
use App\Repository\UserLocationInterface;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{

    private $userLocation;

    public function __construct(UserLocationInterface $userLocation)
    {
        $this->middleware('auth');

        $this->userLocation = $userLocation;
    }


    public function index() {
        $locations = $this->userLocation->getAll(optional(auth()->user())->id);

        return view('auth.locations', compact('locations'));
    }

    public function create() {
        return view('auth.addLocation', ['location'=> []]);
    }

    public function store(UserLocationRequest $request) {

        $this->userLocation->create(optional(auth()->user())->id, $request->all());

        return redirect()->route('user.location');
    }

    public function show($id) {
        $location = $this->userLocation->getOne(optional(auth()->user())->id, $id);

        return view('auth.addLocation', compact('location'));
    }

    public function update($id, Request $request) {
        $request->request->add(['user_id'=> optional(auth()->user())->id]);

        $attributes = $request->validate([
            'user_id'   => 'numeric',
            'paci'      => 'required_without:area',
            'area'      => 'required_without:paci|alpha_num',
            'location'  => 'alpha_num',
            'is_active' => 'boolean',
            'map'       => '',
        ]);

        $this->userLocation->update($id, $attributes);

        return redirect()->route('user.location');
    }
}
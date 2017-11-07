<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ShopCreateRequest;
use App\Repository\ShopInterface;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShopCRUDController extends Controller
{
    private $shop;

    public function __construct(ShopInterface $shop)
    {
        $this->middleware('auth');
        $this->shop = $shop;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('permission', 'shop.create')) {
            abort(403, trans('error_messages.unauthorized'));
        }

        return view('shop.create_edit', ['shop'=> []]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopCreateRequest $request) {
        if(Gate::denies('permission', 'shop.create')) {
            abort(403, trans('error_messages.unauthorized'));
        }

        $this->shop->create($request->all());

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        if(Gate::denies('permission', 'shop.edit')) {
            abort(403, trans('error_messages.unauthorized'));
        }

        if(is_null($id)){
            $shop = $this->shop->getOneByUserId();
        }
        else {
            $shop = $this->shop->getOne($id);
        }

        return view('shop.create_edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(ShopCreateRequest $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        $this->shop->update($request->get('id'), $request->all());

        return redirect()->route('home');
    }

}

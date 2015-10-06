<?php
namespace lublog\Http\Controllers;

use lublog\Http\Requests;
use lublog\Http\Controllers\Controller;
use Illuminate\Http\Request;
use lublog\Categories;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $categories_list = Categories::get();
        return view('admin.categories')->with('categories_list', $categories_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $categories = Categories::create($request->only('name'));
        if ($categories) {
            $message = "添加分类成功";
        } else {
            $message = "添加分类失败";
        }
        return redirect('/admin/categories')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id            
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id            
     * @return Response
     */
    public function destroy($id)
    {
        if (Categories::destroy($id)) {
            $message = "删除成功";
        } else {
            $message = "删除失败";
        }
        return redirect('/admin/categories')->with('message', $message);
    }
}

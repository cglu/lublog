<?php namespace lublog\Http\Controllers;

use lublog\Http\Requests;
use lublog\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MottoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$mottos=Redis::command('SMEMBERS',['mottos']);
		return view('admin.mottos')->with('mottos',$mottos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$result=Redis::command('SADD',['mottos',$request->input("name")]);
		if($result){
		    return redirect('/admin/motto')->with('message','添加博客签名成功.');
		}else{
		    return redirect('/admin/motto')->with('message','添加博客签名失败.');
		    
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($motto)
	{
		$result=Redis::command('SREM',['mottos',$motto]);
		if ($result){
		    return redirect('/admin/motto')->with('message','删除博客签名成功.');
		}else{
		    return redirect('/admin/motto')->with('message','添加博客签名失败.');
		}
	}

}

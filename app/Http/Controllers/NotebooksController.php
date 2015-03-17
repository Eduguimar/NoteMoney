<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Notebook;
use Auth;
use Laracasts\Flash\Flash;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNotebookRequest;

use Illuminate\Http\Request;

class NotebooksController extends Controller {

    //Construtor para aplicar o método de autenticação no controller
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('notebooks.home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('notebooks.home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateNotebookRequest $request)
	{
		$notebook = new Notebook($request->all());

        Auth::user()->notebooks()->save($notebook);


        Flash::error('');

        return Redirect::route('notebooks.index')->with('message', 'Caderno criado!');
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
	public function destroy($id)
	{
		//
	}

}

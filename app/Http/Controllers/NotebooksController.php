<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Notebook;
use Auth;
use Input;
use Laracasts\Flash\Flash;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNotebookRequest;

use Request;

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
        if(Auth::user())
        {
            $notebooks = Auth::user()->notebooks;

            if($notebooks->count()) {
                $notebook_array = end($notebooks);

                $last_notebook = end($notebook_array);

                return view('notebooks.home', compact('notebooks', 'last_notebook'));
            } else {
                return view('notebooks.home', compact('notebooks'));
            }

        }
        else
        {
            return view('auth.login');
        }
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
     * @param CreateNotebookRequest $request
	 * @return Response
	 */
	public function store(CreateNotebookRequest $request)
	{
		$notebook = new Notebook($request->all());

        Auth::user()->notebooks()->save($notebook);

        return Redirect::route('notebooks.index')->with('message', 'Caderno criado!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Notebook  $notebook
	 * @return Response
	 */
	public function show(Notebook $notebook)
	{
        $notebooks = Auth::user()->notebooks;

		return view('notebooks.show', compact('notebook', 'notebooks'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Notebook  $notebook
	 * @return Response
	 */
	public function edit(Notebook $notebook)
	{
        $notebooks = Auth::user()->notebooks;

        return view('notebooks.edit', compact('notebook', 'notebooks'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Notebook  $notebook
     * @param  CreateNotebookRequest $request
	 * @return Response
	 */
	public function update(Notebook $notebook, CreateNotebookRequest $request)
	{
        $notebook->update($request->all());

        return Redirect::route('notebooks.show', $notebook)->with('message', 'Caderno Atualizado!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Notebook  $notebook
	 * @return Response
	 */
	public function destroy(Notebook $notebook)
	{
        $notebook->delete();

        return Redirect::route('notebooks.index')->with('message', 'Caderno Excluído!');
	}

}

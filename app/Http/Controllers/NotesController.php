<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\CreateNoteRequest;
use App\Notebook;
use App\Note;

use Input;
use Redirect;
use Request;
use Auth;

class NotesController extends Controller {

    private $i = 0;
    private $j = 0;

    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
     * @param Notebook $notebook
     * @param Note $note
	 * @return Response
	 */
	public function index(Notebook $notebook, Note $note)
	{
        $notebooks = Auth::user()->notebooks;

        return view('notes.show', compact('notebook', 'note', 'notebooks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
     * @param Notebook $notebook
	 * @return Response
	 */
	public function create(Notebook $notebook)
	{
        $notebooks = Auth::user()->notebooks;

		return view('notes.create', compact('notebook', 'notebooks'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param Notebook $notebook
     * @param CreateNoteRequest $request
	 * @return Response
	 */
	public function store(Notebook $notebook, CreateNoteRequest $request)
	{
		$note = new Note($request->all());
        $notebook->notes()->save($note);

        return Redirect::route('notebooks.show', $notebook)->with('message', 'Nota criada!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Notebook  $notebook
     * @param Note $note
	 * @return Response
	 */
	public function show(Notebook $notebook, Note $note)
	{
        $notebooks = Auth::user()->notebooks;

		return view('notes.show', compact('notebook', 'note', 'notebooks'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
     * @param Notebook $notebook
	 * @param  Note  $note
	 * @return Response
	 */
	public function edit(Notebook $notebook, Note $note)
	{
        $notebooks = Auth::user()->notebooks;

        return view('notes.edit', compact('notebook', 'note', 'notebooks'));
	}

	/**
	 * Update the specified resource in storage.
	 *
     * @param Notebook $notebook
     * @param CreateNoteRequest $request
	 * @param  Note $note
	 * @return Response
	 */
	public function update(Notebook $notebook, Note $note, CreateNoteRequest $request)
	{
		$note->update($request->all());

        return Redirect::route('notebooks.notes.show', [$notebook, $note])->with('message', 'Nota Atualizada!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
     * @param Notebook $notebook
	 * @param  Note  $note
	 * @return Response
	 */
	public function destroy(Notebook $notebook, Note $note)
	{
		$note->delete();

        return Redirect::route('notebooks.show', $notebook)->with('message', 'Nota excluída!');
	}

    public function display()
    {
        $notebooks = Auth::user()->notebooks;

        $notes = null;

        foreach($notebooks as $notebook) {
            $notebook_id = $notebook['id'];
            $notes[$this->i] = Note::where('notebook_id', '=', $notebook_id)->get();
            $this->i++;
        }

        return view('notes.display', compact('notebooks', 'notes'));
    }

    public function search()
    {
        $notebooks = Auth::user()->notebooks;

        $notes = null;

        $q = Input::get('search');

        foreach($notebooks as $notebook) {
            $notebook_id = $notebook['id'];

            $notes[$this->j] = Note::where(function($query) use($q){
                $query->where('title', 'LIKE', '%' . $q . '%')->orWhere('description', 'LIKE', '%' . $q . '%');
            })->where('notebook_id', '=', $notebook_id)->get();

            $this->j++;
        }

        //dd($notes);

        return view('notes.displaysearch', compact('notebooks', 'notes'));
    }

}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\CreateTransactionRequest;

use Auth;
use Redirect;
use Input;
class TransactionsController extends Controller {

    public $totalAmount, $total;

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
        $data_inicio = Input::get('data_inicio');
        $data_fim = Input::get('data_fim');
        $dater = false;

        if((isset($data_inicio) && $data_inicio != null) && (isset($data_fim) && $data_fim != null)) {
            $transactions = Transaction::whereBetween('created_at', array(new Carbon($data_inicio), new Carbon($data_fim)))->where('user_id', '=', Auth::user()->id)->get();
            $dater = true;
        } else {
            $transactions = Auth::user()->transactions;
        }

        foreach ($transactions as $transaction) {
            $amount = $transaction['amount'];

            if ($transaction['type'] == 'income') {
                $this->total += $amount;
            } else {
                $this->total -= $amount;
            }

            $value = number_format($amount, 2, ',', '.');
            $transaction['amount'] = 'R$ ' . $value;
        }

        $this->totalAmount = number_format($this->total, 2, ',', '.');

        return view('transactions.index', ['transactions' => $transactions, 'totalAmount' => $this->totalAmount, 'dater' => $dater]);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('transactions.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTransactionRequest $request
     * @return Response
     */
	public function store(CreateTransactionRequest $request)
	{
		$transaction = new Transaction($request->all());
        $amount = $this->fromMoney($transaction['amount']);
        $transaction['amount'] = $amount;

        Auth::user()->transactions()->save($transaction);

        return Redirect::route('transactions.index')->with('message', 'Lançamento criado!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Transaction $transaction
	 * @return Response
	 */
	public function show(Transaction $transaction)
	{
		return view('transactions.show', compact('transaction'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Transaction $transaction
	 * @return Response
	 */
	public function edit(Transaction $transaction)
	{
		return view('transactions.edit', compact('transaction'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Transaction $transaction
     * @param  Request $request
	 * @return Response
	 */
	public function update(Transaction $transaction, Request $request)
	{
        $value = $request->all();
        $amount = $this->fromMoney($value['amount']);
        $value['amount'] = $amount;

        $transaction->update($value);

        return Redirect::route('transactions.index', $transaction)->with('message', 'Lançamento Atualizado!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Transaction $transaction
	 * @return Response
	 */
	public function destroy(Transaction $transaction)
	{
		$transaction->delete();

        return Redirect::route('transactions.index')->with('message', 'Lançamento Excluído!');
	}

    public function fromMoney($amount)
    {
        $value1 = str_replace(".", "", $amount);
        $value2 = str_replace(",", ".", $value1);
        return $value2;
    }
}
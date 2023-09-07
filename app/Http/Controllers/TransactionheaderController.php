<?php

namespace App\Http\Controllers;

use App\Models\Transactiondetail;
use App\Models\Transactionheader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TransactionheaderController extends Controller
{
    public function index(Request $request)
    {
        // $transactions = Transactionheader::orderBy('created_at', 'desc')->get();;
        // return view('transactions', compact('transactions'));

        $transactions = Transactionheader::orderBy('id', 'desc')
            ->when(
                $request->date_from && $request->date_to,
                function (Builder $builder) use ($request) {
                    $builder->whereBetween(
                        Transactionheader::raw('DATE(created_at)'),
                        [
                            $request->date_from,
                            $request->date_to
                        ]
                    );
                }
            )->paginate(10);

        return view('transactions', compact('transactions', 'request'));
    }
    public function cetak_pdf(Request $request)
    {
        $transactions = Transactionheader::orderBy('id', 'desc')
        ->when(
            $request->date_from && $request->date_to,
            function (Builder $builder) use ($request) {
                $builder->whereBetween(
                    Transactionheader::raw('DATE(created_at)'),
                    [
                        $request->date_from,
                        $request->date_to
                    ]
                );
            }
        )->paginate(100);
 
        $pdf = PDF::loadView('transactions', $transactions);
     
        return $pdf->download('transactions.pdf');
    }

    public function detail($dc, $du)
    {
        $transaction = Transactiondetail::where('document_code', $dc)->where('document_number', $du)->get();
        return view('transaction', compact('transaction'));
    }

    public function transaction(Request $request)
    {
        $total_harga = 0;
        foreach (session('cart') as $data) {
            $total_harga = $data['price'] * $data['quantity'];
            $qty = $data['quantity'];
        }
        $rand = rand(1, 1000);
        $new = new Transactionheader();
        $new->user = Auth::user()->name;
        $new->document_number = $rand;
        $new->document_code = "TRX";
        $new->total = $total_harga;
        $new->save();


        foreach (session('cart') as $data) {
            $total_harga = $data['price'] * $data['quantity'];
            $qty = $data['quantity'];
            $OrderPro = new Transactiondetail();
            $OrderPro->document_code = "TRX";
            $OrderPro->document_number = $rand;
            $OrderPro->product_code = $data['product_code'];
            $OrderPro->price = $data['price'];
            $OrderPro->subtotal = $total_harga;
            $OrderPro->currency = "IDR";
            $OrderPro->qty = $qty;
            $OrderPro->unit = "PCS";
            $OrderPro->save();
        }

        $request->session()->forget('cart');
        return redirect('/transactions');
    }
}

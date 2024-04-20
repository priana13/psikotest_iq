<?php

namespace App\Http\Livewire\Checkout;

use App\Models\PaymentMethod;
use App\Models\Package;
use App\Models\Transaction;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $product,
            $productSelected,
            $package,
            $qty= 1, 
            $nama,
            $hp,
            $email,
            $alamat, 
            $harga, 
            $payment_method,
            $list_payment_methods,
            $total,
            $disc=0,
            $ppn= 4500;
    public $label_rekening_selected = 'Pilih Metode Pembayaran';
    public $rekening_selected;
    public $type = [
        'bulanan' => 'Bulan',
        'mingguan' => 'Minggu'
    ];
    public $jumlah_bulan;

    public function mount(){

        $this->list_payment_methods = PaymentMethod::all();
        $this->package = Package::where('is_show', true)->get(); 

        $this->productSelected = Package::first(); 

        if( Package::find( request()->paket )){

            $this->productSelected = Package::find( request()->paket );
            
        }

        $this->product = $this->productSelected->id;

        $this->nama = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->hp = auth()->user()->hp;
        $this->alamat = auth()->user()->alamat;
        // $this->jumlah_bulan = $this->product->qty;


    }

    protected $rules = [
        'product' => 'required',
        'payment_method' => 'required'
    ];

    
    public function render()
    {     
     

        if($this->qty == ''){$this->qty = 0;}
        $this->productSelected = Package::find($this->product);

        // $this->qty = $this->productSelected->qty;       
       
        $this->harga = $this->productSelected->price;
        $this->total = ($this->harga * $this->qty ) + $this->ppn;  
        
        $this->jumlah_bulan = $this->productSelected->qty * $this->qty;

        return view('livewire.checkout.checkout-show');
    }

    public function store(){      

        $this->validate([
            'product' => 'required'               
        ]);

        $email = (Auth::check()) ? auth()->user()->email : 'peserta@arstamedia.com';     
        
        $rekening = PaymentMethod::first();

        $transaksi = Transaction::create([

            'user_id' => auth()->user()->id,
            'code' => uniqid(),              
            'nominal' => $this->total,
            'qty' => $this->qty,
            'notes' => 'pesan membership',            
            'package_id' => $this->product,
            'nama' => $this->nama,
            'hp' => $this->hp, 
            'email' => $email,
            'alamat' => $this->alamat,
            'ppn' => $this->ppn,
            'total' => $this->total
        ]);




        return redirect()->route('checkout.thanks' , $transaksi->id);


    }

    public function pilihRekening($id){

        $this->rekening_selected = PaymentMethod::find($id);
        $this->payment_method = $id;
        $this->label_rekening_selected = $this->rekening_selected->name;
    }
}

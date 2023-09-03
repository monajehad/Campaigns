<!-- resources/views/payment/payment-interface.blade.php -->
@extends ('backend.layouts.app')

@section('content')
    <h1>Seamless Payments, Effortless Transactions</h1>
    <p>Your Secure Gateway to Easy Shopping</p>
    
    <h2>Pay with Card</h2>
    <form action="{{ route('process-card-payment') }}" method="POST">
        @csrf
        <label for="card_number">Card Number</label>
        <input type="text" id="card_number" name="card_number" required>
        
        <label for="expiry_date">Expiry Date</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
        
        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" required>
        
        <button type="submit">Pay with Card</button>
    </form>
    
    <h2>Pay with USDT</h2>
    <p>You can use this address to transfer to us:</p>
    <input type="text" id="usdt_address" value="0xdac17f958d2ee523a2206206994597c13d831ec7" readonly>
    <button onclick="copyAddress()">Copy</button>
    
    <h2>Pay $1</h2>
    <form action="{{ route('process-usdt-payment') }}" method="POST">
        @csrf
        <input type="hidden" name="amount" value="1">
        <button type="submit">Pay $1</button>
    </form>
    
    <p>By clicking the Pay button, you automatically agree to our <a href="/terms-of-service">Terms of Service</a> and <a href="/privacy-policy">Privacy Policy</a>.</p>
    
    <script>
        function copyAddress() {
            var usdtAddress = document.getElementById("usdt_address");
            usdtAddress.select();
            document.execCommand("copy");
            alert("Address copied to clipboard: " + usdtAddress.value);
        }
    </script>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Razorpay Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Complete Your Payment</h1>
        <form name="razorpayform" action="{{ route('razorpay.verify') }}" method="POST">
            @csrf
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" value="{{ $order['id'] }}">
            <input type="hidden" name="razorpay_signature" id="razorpay_signature">
        </form>
        <button id="rzp-button1" class="btn btn-primary">Pay Now</button>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ $key }}",
            "amount": {{ $amount }},
            "currency": "INR",
            "name": "BuildMyFolio",
            "description": "Payment for Premium Feature",
            "order_id": "{{ $order['id'] }}",
            "handler": function (response) {
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                document.forms['razorpayform'].submit();
            },
            "prefill": {
                "name": "Test User",
                "email": "test.user@example.com",
                "contact": "9000090000"
            },
            "theme": {
                "color": "#00ff84"
            }
        };
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
</body>
</html>
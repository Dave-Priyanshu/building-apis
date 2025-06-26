<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make a Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Make a Payment</h1>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('razorpay.initiate') }}" method="POST">
            @csrf
            <p>You will be charged ₹1000 for BuildMyFolio Premium Feature.</p>
            <button type="submit" class="btn btn-primary">Pay with Razorpay</button>
        </form>
    </div>
</body>
</html>
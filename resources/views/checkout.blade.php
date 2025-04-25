@extends('layouts/layout')
@section('page_title', 'Checkout')
@section('container')

    <style>
        .ayur-checkout-wrapper {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .ayur-checkout-head h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .ayur-form-input label {
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }

        .ayur-form-input input.form-control,
        .ayur-form-input select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fff;
        }

        .ayur-btn {
            padding: 12px 30px;
            background-color: #0c714c;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .ayur-btn:hover {
            background-color: #095c3e;
        }

        .ayur-checkout-payment {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: #fff;
        }

        .ayur-chkout-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .payment_box {
            margin-top: 10px;
            padding-left: 25px;
            color: #555;
            font-size: 14px;
        }
    </style>
    <div class="ayur-bread-section">
        <div class="ayur-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ayur-bread-content">
                            <h2>Checkout</h2>
                            <div class="ayur-bread-list">
                                <span>
                                    <a href="index.html">Home</a>
                                </span>
                                <span class="ayur-active-page">Checkout</span>
                                <span class="ayur-active-page"><a href="{{ route('logout') }}">Logout</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Breadcrumb Section end ----------->
    <div class="ayur-checkout-wrapper">
        <div class="container">
            <div class="ayur-checkout-head">
                <h3>Order Summary</h3>
            </div>

            <div class="ayur-checkout-payment">
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead style="background-color: #f1f1f1;">
                        <tr style="border-bottom: 1px solid #ccc;">
                            <th style="padding: 10px; text-align: left;">Product</th>
                            <th style="padding: 10px; text-align: left;">Quantity</th>
                            <th style="padding: 10px; text-align: left;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($cartItems as $item)
                            @php
                                $itemTotal = $item['price'] * $item['quantity'];
                                $total += $itemTotal;
                            @endphp
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 10px;">{{ $item['name'] }}</td>
                                <td style="padding: 10px;">{{ $item['quantity'] }}</td>
                                <td style="padding: 10px;">Rs{{ number_format($itemTotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="ayur-chkout-flex" style="margin-top: 20px;">
                    <h4 style="color: #333;">Total:</h4>
                    <h4 style="color: #0c714c;">Rs{{ number_format($total, 2) }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="ayur-bgcover ayur-checkout-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ayur-checkout-table-wrapper">
                        <form class="ayur-checkout-form" id="checkout-form" action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="ayur-checkout-head">
                                        <h3>Billing Details</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>Select Country <span>*</span></label>
                                                <select class="mySelect" name="country" required>
                                                    <option value="">Select a country…</option>
                                                    <option value="India">India</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" class="form-control" name="first_name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text" class="form-control" name="last_name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>Billing Address <span>*</span></label>
                                                <input type="text" class="form-control" name="billing_address" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>Town / City <span>*</span></label>
                                                <input type="text" class="form-control" name="city" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>State/Region <span>*</span></label>
                                                <input type="text" class="form-control" name="region" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>Postcode / Zip <span>*</span></label>
                                                <input type="text" class="form-control" name="zip" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>Contact <span>*</span></label>
                                                <input type="text" class="form-control" name="contact" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="ayur-checkout-head">
                                        <h3>Shipping Details</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>Select Country <span>*</span></label>
                                                <select class="mySelect" name="shipping_country" required>
                                                    <option value="">Select a country…</option>
                                                    <option value="India">India</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>State</label>
                                                <input type="text" class="form-control" name="shipping_state" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="ayur-form-input ayur-check-form">
                                                <label>Postcode / Zip Code</label>
                                                <input type="text" class="form-control" name="shipping_zip" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="ayur-checkout-head ayur-woocommerce-payment">
                                                <h3>Payment Method</h3>
                                                <div class="payment-method methods">
                                                    <div class="ayur-checkout-payment">
                                                        <div class="ayur-chkout-flex">
                                                            <div class="ayur-rate">
                                                                <div class="custom-checkbox">
                                                                    <input type="radio" value="razorpay" id="c1"
                                                                        name="checkout" required>
                                                                    <label for="c1"></label>
                                                                </div>
                                                            </div>
                                                            <h4>Razorpay</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="ayur-checkout-order">
                                                {{-- <button type="button" class="ayur-btn" id="rzp-button1">Place
                                                    Order</button> --}}
                                                <button type="button" id="place-order-btn" class="btn btn-primary">Place
                                                    Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Razorpay Script -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('place-order-btn').addEventListener('click', function(e) {
            e.preventDefault();

            let formData = new FormData(document.getElementById('checkout-form'));

            fetch('{{ route('place.order') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    const options = {
                        "key": "{{ env('RAZORPAY_KEY') }}",
                        "amount": data.amount,
                        "currency": "INR",
                        "name": "Your Shop Name",
                        "description": "Order Payment",
                        "order_id": data.razorpay_order_id,
                        "handler": function(response) {
                            // After payment success
                            fetch('{{ route('payment.success') }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        razorpay_order_id: data.razorpay_order_id,
                                        razorpay_payment_id: response.razorpay_payment_id,
                                        razorpay_signature: response.razorpay_signature
                                    })
                                })
                                .then(res => res.json())
                                .then(response => {
                                    alert(response.message || "Payment completed!");
                                    window.location.href =
                                        '{{ route('thankyou') }}'; // Redirect to thank you or order success page
                                });
                        },
                        "prefill": {
                            "name": data.user_name,
                            "email": data.email,
                            "contact": data.contact
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    const rzp = new Razorpay(options);
                    rzp.open();
                })
                .catch(err => {
                    console.error(err);
                    alert('Something went wrong. Please try again.');
                });
        });
    </script>

    {{-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById("rzp-button1").addEventListener("click", function() {
            console.log("Place Order button clicked");
            const formData = new FormData(document.querySelector('.ayur-checkout-form'));

            fetch("{{ route('place.order') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.razorpay_order_id) {
                        const options = {
                            "key": "{{ env('RAZORPAY_KEY') }}",
                            "amount": data.amount,
                            "currency": "INR",
                            "name": "Your Store",
                            "description": "Order Payment",
                            "order_id": data.razorpay_order_id,
                            "handler": function(response) {
                                fetch("{{ route('payment.success') }}", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                        },
                                        body: JSON.stringify({
                                            razorpay_order_id: response.razorpay_order_id,
                                            razorpay_payment_id: response
                                                .razorpay_payment_id,
                                            razorpay_signature: response.razorpay_signature
                                        })
                                    })
                                    .then(res => res.json())
                                    .then(res => {
                                        alert("Payment Successful!");
                                        window.location.href =
                                            "{{ route('thankyou.page') }}"; // Optional redirect
                                    })
                                    .catch(err => {
                                        alert("Payment recorded but failed to update backend.");
                                        console.error(err);
                                    });
                            },
                            "prefill": {
                                "name": data.user_name,
                                "email": data.email,
                                "contact": data.contact
                            },
                            "theme": {
                                "color": "#0b5ed7"
                            }
                        };
                        const rzp1 = new Razorpay(options);
                        rzp1.open();
                    } else {
                        alert('Error: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script> --}}
@endsection

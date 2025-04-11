@extends('layouts/layout')
@section('page_title', 'Services')
@section('container')

    <style>
        .cont,
        {
        margin-bottom: 200px;
        }

        .content {
            font-family: Arial, sans-serif;
            line-height: 1.7;
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        h1,
        h2 {
            color: #5A8F3C;
        }

        p {
            margin-bottom: 15px;
        }

        ul {
            padding-left: 20px;
        }
    </style>
    <div class="cont">
        <div class="main-containr" style="margin-top: 100px;">

            <div class="content">
                <h1>Shipping & Delivery</h1>

                <p>At <strong>Sukh Darshan</strong>, we are committed to delivering our Ayurveda products to you in the
                    safest and most efficient manner. We aim to ensure that your experience with us is seamless from
                    purchase to doorstep.</p>

                <h2>Delivery Time</h2>
                <ul>
                    <li><strong>Orders within India:</strong> 3–7 business days</li>
                    <li><strong>International Orders:</strong> 7–15 business days (may vary based on location and customs)
                    </li>
                </ul>

                <p><strong>Note:</strong> Delivery timelines may be affected during holidays, festivals, or unforeseen
                    logistical delays.</p>

                <h2>Shipping Charges</h2>
                <ul>
                    <li><strong>Free shipping</strong> on orders above ₹999 (India only)</li>
                    <li>Standard shipping charges will apply on orders below ₹999</li>
                    <li>International shipping charges are calculated at checkout based on weight and destination</li>
                </ul>

                <h2>Order Processing</h2>
                <p>Orders are processed within 1–2 business days after successful payment. Once dispatched, a tracking ID
                    will be shared via email or SMS to help you monitor your shipment.</p>

                <h2>Delivery Partners</h2>
                <p>We work with trusted courier partners to ensure your orders reach you safely and on time. Our logistics
                    partners include Blue Dart, Delhivery, DTDC, and India Post for domestic shipments.</p>

                <h2>Packaging</h2>
                <p>All our products are packed with utmost care using eco-friendly and secure packaging to preserve the
                    quality of our Ayurvedic items.</p>

                <h2>Shipping Restrictions</h2>
                <p>Currently, we do not ship to PO boxes or military addresses. For international shipping, please check if
                    Ayurvedic products are allowed in your country before placing an order.</p>

                <h2>Need Help?</h2>
                <p>If you have any questions about shipping or your delivery, feel free to reach out to us at <a
                        href="mailto:sukhdarshanpharmacy@gmail.com ">sukhdarshanpharmacy@gmail.com </a> or call us at
                    +91-822285608,
                    +91-8222856502.</p>

                <p>Thank you for choosing Sukh Darshan — your trusted source for authentic Ayurvedic wellness.</p>
            </div>
        </div>

    </div>


@endsection

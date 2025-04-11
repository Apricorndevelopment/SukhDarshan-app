@extends('layouts/layout')
@section('page_title', 'Cancellation & Refund Policy - Sukh Darshan')
@section('container')

    <style>
        .cont,
        {
        margin-bottom: 200px;
        }

        .content {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.8;
            padding: 30px;
            max-width: 900px;
            margin: auto;
            font-size: 18px;
            background-color: #fdfdfb;
            color: #333;
        }

        h1 {
            font-size: 32px;
            color: #4E7D2D;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            color: #5A8F3C;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        p {
            margin-bottom: 18px;
        }

        ul {
            padding-left: 25px;
            margin-bottom: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #4E7D2D;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <div class="cont">
        <div class="main-containr" style="margin-top: 100px;">

            <div class="content">
                <h1>Cancellation & Refund Policy</h1>

                <p>At <strong>Sukh Darshan</strong>, customer satisfaction is our top priority. We understand that sometimes
                    plans change, and you may need to cancel or return an order. Please read our cancellation and refund
                    policy below to understand how we can help.</p>

                <h2>Order Cancellation</h2>
                <ul>
                    <li>Orders can be cancelled <strong>within 12 hours</strong> of placing them, provided they have not yet
                        been dispatched.</li>
                    <li>To request a cancellation, please contact us immediately at <a
                            href="mailto:sukhdarshanpharmacy@gmail.com">sukhdarshanpharmacy@gmail.com</a> or call
                        +91-+91-822285608, +91-8222856502..</li>
                    <li>Once the order is shipped, it cannot be cancelled.</li>
                </ul>

                <h2>Refund Eligibility</h2>
                <p>We offer refunds or replacements under the following conditions:</p>
                <ul>
                    <li>You received a <strong>damaged, defective, or wrong product</strong>.</li>
                    <li>The item is returned in its original packaging, unused, and sealed condition within <strong>7
                            days</strong> of delivery.</li>
                </ul>

                <h2>Non-Refundable Items</h2>
                <p>Due to the nature of our products, we do not accept returns or provide refunds for:</p>
                <ul>
                    <li>Opened or used Ayurvedic products</li>
                    <li>Items purchased during sales or promotions</li>
                    <li>Products returned without original packaging</li>
                </ul>

                <h2>Refund Process</h2>
                <ul>
                    <li>Once we receive and inspect the returned item, we will notify you of the approval or rejection of
                        your refund.</li>
                    <li>If approved, your refund will be processed to your original payment method within <strong>7–10
                            business days</strong>.</li>
                    <li>Shipping charges are non-refundable unless the return is due to our error.</li>
                </ul>

                <h2>How to Request a Refund</h2>
                <p>To initiate a return or refund, please email us at <a
                        href="mailto:sukhdarshanpharmacy@gmail.com">sukhdarshanpharmacy@gmail.com</a> with your order number,
                    reason for
                    return, and photos (if applicable).</p>

                <h2>Need Help?</h2>
                <p>For any questions regarding your order, returns, or refunds, feel free to contact our support team. We
                    are here to assist you with care and integrity.</p>

                <p>Thank you for choosing <strong>Sukh Darshan</strong> – your trusted partner in Ayurvedic wellness.</p>
            </div>
        </div>

    </div>


@endsection

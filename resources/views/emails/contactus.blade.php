<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Message</title>
</head>

<body>
    <h2>You have a new message from the contact form</h2>
    <p><strong>First Name</strong>{{ $first_name }}</p>
    <p><strong>Last Name</strong>{{ $last_name }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $msg }}</p>
</body>

</html>

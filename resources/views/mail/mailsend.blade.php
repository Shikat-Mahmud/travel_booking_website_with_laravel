<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <p><strong>Name:</strong> {{ $sendData['name'] }}</p>
    <p><strong>Email:</strong> {{ $sendData['email'] }}</p>
    <p><strong>Phone:</strong> {{ $sendData['phone'] }}</p>
    <p><strong>Message:</strong> {{ $sendData['message'] }}</p>
</body>
</html>
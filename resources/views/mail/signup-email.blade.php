Hello {{$email_data['name']}}
<br><br>
Welcome to Online Rental System!
<br>
Please click the below link to verify your email and activate your account!
<br><br>
<a href="http://127.0.0.1:8000/verifyowner?code={{$email_data['verification_code']}}">Click Here!</a>

<br><br>
Thank you!
<br>
Online Apartment rental System
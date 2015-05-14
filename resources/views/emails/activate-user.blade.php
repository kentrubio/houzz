<div>
    <p>Hi {{$first_name}} {{$last_name}},</p>
    <p>
        Thank you for registering to our application. To activate your account please click this link {{url('activate-user').'?email='.$email.'&activation_code='.$activation_code}} or copy if it doesn't work.
    </p>
</div>

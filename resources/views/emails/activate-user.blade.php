<div>
    <p>Hi,</p>
    <p>
        Thank you for registering to our application. To activate your account please click this link {{link_to(Config::get('app.url').'/activate-user/?email='.$email.'&activation_code='.$activation_code, Config::get('app.url').'/activate-user/?email='.$email.'&activation_code='.$activation_code)}} or copy if it doesn't work.
    </p>
</div>

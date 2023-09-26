<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به حساب کاربری</title>
    <link rel="stylesheet" href="{{URL::asset('/css')}}/login.css">
    <link rel="stylesheet" href="{{URL::asset('/css')}}/all.min.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="box-header">
                <h1>ورود به حساب کاربری</h1>
            </div>
            <div class="box-body">
                <form method="POST">
                    @if($errors->any())
                    <div style="background:#ff0000cc;color:white;padding:10px 0px;width:400px;margin:auto;border-radius:5px;margin-top:20px">{{$errors->first()}}</div>
                    @endif
                    <div><input type="text" name="name" placeholder="نام کامل *" maxlength=11 required><i class="fa fa-mobile"></i></div>
                    <div><input type="text" name="username" placeholder="شماره همراه *" maxlength=11 required><i class="fa fa-mobile"></i></div>
                    <div><input type="password" name="password" placeholder="رمز عبور *" required><i class="fa fa-key"></i></div>
                    <div><input type="password" name="password_confirmation" placeholder="رمز عبور *" required><i class="fa fa-key"></i></div>
                    @csrf
                    <input type="submit" value="ورود">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
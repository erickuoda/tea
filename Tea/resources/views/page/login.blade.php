<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fleid" style="background:url('/image/image.jpg');height:965px">
    <div class="container" style="padding-top:200px;height:auto">
        <div class="card border-dark mb-3 " style="max-width: 25rem;margin-left:auto;margin-right:auto;">
            <div class="card-header text-center">登入</div>
            <div class="card-body text-dark">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">帳號</label>
                        <input type="text" name="userID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="請輸入帳號">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">密碼</label>
                        <input type="password" name="userPWD" class="form-control" id="exampleInputPassword1" placeholder="請輸入密碼">
                    </div>
                    <button type="submit" class="btn btn-primary">登入</button>
                </form>
            </div>
        </div>
    </div>
</div>   
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Sign Up | ZS CREITIVE </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    @include('admin.components.styles')
    @yield('Style')

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="index.html" class="logo logo-admin"><img src="{{asset('assets/images/logo_zs.png')}}"
                                        height="140" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                @if (!empty($info['user']))
                                <p class=" p-2  text-center">You are going to signup with referal
                                    link of <strong>({{$info['user']}})</strong></p>
                                @endif
                                
                                <h4 class="text-muted font-size-18 mb-1 text-center">Sign Up</h4>
                                <form class="form-horizontal mt-4" action="{{route('register_process')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="sponsor"
                                    value="{{ $info['user'] }}">
                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="email" name="useremail" class="form-control" id="useremail" placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Phone No</label>
                                        <input type="text" class="form-control" name="userphone" id="userphone" placeholder="Enter phone no">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="userpassword" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <p>Already have an account ? <a href="{{route('login')}}" class="text-primary"> Login </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    @include('admin.components.scripts')
    @yield('Scripts')
</body>

</html>
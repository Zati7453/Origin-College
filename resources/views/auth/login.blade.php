<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>ORIGIN INTERNATIONAL COLLEGE | Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    @include('auth.components.styles')
    @yield('Style')
</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-2">
                                <a href="javascript:void(0)" class="logo logo-admin"><img src="{{asset('front_asset/images/logooic.png')}}" height="110" class="img-fluid" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Sign In</h4>
                                <form class="form-horizontal mt-4" action="{{route('login_process')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>
                                    <div class="form-group row mt-4">
                                        {{-- <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember me
                                                </label>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light " type="submit">Log In</button>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="mt-3 text-center">
                        <p>Don't have an account ? <a href="{{route('register')}}" class="text-primary"> Signup Now </a></p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    @include('auth.components.scripts')
    @yield('Scripts')
</body>

</html>
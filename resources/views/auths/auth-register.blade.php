<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Kanban - Register</title>
    <link rel="shortcut icon" href="../images/favicon.png">
    <link rel="stylesheet" href="../assets/css/style926d.css?v1.1.1">
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap align-items-center justify-content-center">
                <div class="container p-2 p-sm-4">
                    <div class="card overflow-hidden card-gutter-lg rounded-4 card-auth card-auth-mh">
                        <div class="row g-0 flex-lg-row-reverse">
                            <div class="col-lg-5">
                                <div class="card-body h-100 d-flex flex-column justify-content-center">
                                    <div class="nk-block-head text-center">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title mb-1">Create New Account</h3>
                                            <p class="small">Use your remail email continue with Kanban (it's free)!
                                            </p>
                                            @if (session('error'))
                                                <span
                                                    style="color: #fff; background-color: rgb(247, 149, 154); padding: 5px; width: 50%; margin-left: 25%; border-radius: 5px">
                                                    {{ session('error') }}
                                                </span>
                                            @endif

                                            @if (session('success'))
                                                <span
                                                    style="color: #fff; background-color: rgb(132, 241, 118); padding: 5px; width: 50%; margin-left: 25%; border-radius: 5px">
                                                    {{ session('success') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="row gy-3">
                                            <div class="col-12">
                                                <div class="form-group"><label for="username"
                                                        class="form-label">Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="name"
                                                            id="username"placeholder="Enter fullname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group"><label for="email"
                                                        class="form-label">Email</label>
                                                    <div class="form-control-wrap">
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="Enter email address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group"><label for="password"
                                                        class="form-label">Password</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="password"
                                                            id="password" placeholder="Enter password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid"><button class="btn btn-primary" type="submit">Sign
                                                        up</button></div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="my-3 text-center">
                                        <h6 class="overline-title overline-title-sep"><span>OR</span></h6>
                                    </div>
                                    <div class="text-center mt-4">
                                        <p class="small">Already have an account? <a
                                                href="{{ route('login') }}">Login</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div
                                    class="card-body bg-darker is-theme has-mask has-mask-1 h-100 d-flex flex-column justify-content-end">
                                    <div class="mask mask-1"></div>
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <div class="mt-4">
                                                <div class="h1 title mb-3">Welcome to <br> our Kanaban</div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                                                    dolores optio in nihil dolore quibusdam beatae iure distinctio,
                                                    repudiandae tempore nemo hic delectus, a sequi ea enim cumque velit
                                                    non.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/bundle.js"></script>
<script src="../assets/js/scripts.js"></script>
<!-- Mirrored from html.nioboard.themenio.com/auths/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 May 2023 14:13:02 GMT -->

</html>

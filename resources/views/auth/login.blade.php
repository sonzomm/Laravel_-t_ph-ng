
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oswald', sans-serif;
        }
        body
        {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #060c21;
        }
        .form
        {
            position: relative;
            background: #060c21;
            border: 1px solid #000;
            width: 550px;
            height: 400px;
            padding: 40px 40px 60px;
            border-radius: 10px;
            text-align: center;
        }
        .form::before
        {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            bottom: -2px;
            left: -2px;
            background: linear-gradient(315deg,#e91e63,#5d02ff);
            z-index: -1;
            transform: skew(2deg,1deg);
            border-radius: 10px;
        }
        .form h2
        {
            color: #fff;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 5px;
        }
        .form .input
        {
            margin-top: 1000px;
            text-align: left;
        }
        .form .input .inputBox
        {
            margin-top: 10px;
        }
        .form .input .inputBox label
        {
            display: block;
            color: #fff;
            margin-bottom: 5px;
            font-size: 18px;
            letter-spacing: 1px;
            width: 100px;
        }
        .form .input .inputBox input
        {
            position: relative;
            width: 100%;
            height: 40px;
            border: none;
            outline: none;
            padding: 5px 15px;
            background:linear-gradient(315deg,#e91e63,#5d02ff) ;
            color: #fff;
            font-size: 18px;
            border-radius: 10px;
        }
        .form .input .inputBox input[type="submit"]
        {
            cursor: pointer;
            margin-top: 20px;
            letter-spacing: 1px;
        }
        .form .input .inputBox input[type="submit"]:hover
        {
            background:linear-gradient(315deg,#5d02ff,#e91e63) ;
        }
        .form .input .inputBox input[type="submit"]:active
        {
            color: rgba(255, 255, 255, 0.521);
            background:linear-gradient(315deg,#e91e6271,#5f02ff8c) ;
        }
        .forgot
        {
            margin-top: 10px;
            color: #fff;
            font-size: 14px;
            letter-spacing: 1px;
        }
        .forgot a
        {
            color: #ff0800;
        }
    </style>
    <body>
    <div class="form">
        <h2>Login</h2>
        <form onsubmit="return disableButton()" class="form" action="{{route('postlogin')}}" method="POST">
            @csrf
            <div class="row">
                <div>
                    <div class="form-label-group">
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="Email" value="{{ old('email') }}" required autofocus>
                        <label for="email"></label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" id="password" name="password" autocomplete="new-password"
                               class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}"
                               required>
                        <label for="password"></label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="w-100 d-flex justify-content-center">
                        <button id="btn_submit" class="btn btn-lg btn-primary text-white fw-bold p-2"
                                type="submit" style="border-radius: 2rem;">
                            <div id="submit">
                                Login
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            {{-- <p class="text-center">Doesnt have any account? <a href="/register">register</a></p> --}}
        </form>
    </div>


    <script>
        function disableButton() {
            $("#loading_submit").removeClass("hide");
            $("#text_submit").addClass("hide");
            $("#btn_submit").addClass("isLoading").attr('disabled', 'disabled');
        }
    </script>


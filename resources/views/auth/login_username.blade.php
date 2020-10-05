<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/login/style.css') }}">

</head>

<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <div class="login">{{ 'Apps' }}</div>
                <div class="eula">Login with account LDAP or WiFi, if you have problem with account just contact <a href="mailto:it@helpdesk.pins.co.id">it@helpdesk.pins.co.id</a> </div>
            </div>
            <div class="right">
                <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#12bcfe;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#44ce7b;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
                <div class="form">
                    <!-- form -->
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="emailaddress">Username</label>
                            <input 
                                name="username" 
                                id="email" 
                                type="text" 
                                class="form-control {{$errors->has('username') ? 'is-invalid' : '' }}" 
                                value="{{ old('username') }}" 
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input 
                                name="password" 
                                id="password" 
                                type="password" 
                                value="gloryHorsePower" 
                                readonly>

                        </div>
                      
                        <div class="form-group mb-0 text-center">
                            <input type="submit" id="submit" value="Login">
                        </div>

                    </form>
                    <!-- end form-->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
    <script src="{{ asset('assets/login/app.js') }}"></script>
</body>

</html>
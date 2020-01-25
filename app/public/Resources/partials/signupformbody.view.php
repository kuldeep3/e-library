<body>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Sign Up</h4>
                <form action="" method="post">
                    <div class="form-group input-group">
                        <!-- <div class="input-group-prepand">
                        <span class="input-group-text">
                            <i class="fa fa-user"></i> 
                        </span>
                        </div> -->
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group input-group">
                        <!-- <div class="input-group-prepand">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i> 
                        </span>
                        </div> -->
                    <input type="email" class="form-control" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>  
                </div>
                    <div class="form-group input-group">
                        <!-- <div class="input-group-prepand">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i> 
                        </span>
                        </div> -->
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group input-group">
                        <!-- <div class="input-group-prepand">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i> 
                        </span>
                        </div> -->
                    <input type="password" class="form-control" name="verify_password" placeholder="Verify Password" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" name = "register">Sign Up</button>
                    </div>
                    <p class="text-center">Have an account?<a href="login">Log In</a></p>
                </form>
            </article>
        </div>
    </div>

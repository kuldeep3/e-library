<?php require 'app/public/Resources/partials/formheader.view.php'; ?>
<title>Login</title>

<body>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Login</h4>
                <p>
                    <a href="#" class="btn btn-block btn-google" style="background-color: #EA4135;">
                        <i class="fab fa-google"></i>
                        Login Via Google
                    </a>
                </p>
                <p class="divider-text" style="text-align: center">
                    <span class="bg-light">OR</span>
                </p>
                <form action="" method="post">
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
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                    </div>
                    <p class="text-center">Create an account?<a href="/">Sign Up</a></p>
                </form>
            </article>
        </div>
    </div>
    <?php require 'app/public/Resources/partials/footer.view.php'; ?>
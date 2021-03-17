<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Login</h1>
        </div>
    </div>
    <div class="row">
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-dark" name="login" value="Login">
            </div>
        </form>
    </div>
    <div class="row">
        <?php
        if (isset($viewBag['status'])){
            echo $viewBag['status'];
        }
        ?>
    </div>
</div>
<?php 
if(isset($_SESSION['is_error'])){
    echo '<script>alert("Username atau Password salah");</script>';
    unset($_SESSION['is_error']);
}
?>
<main class="form-container">
    <div class="bg">
        <img src="<?= BASEURL; ?>/assets/img/bg.svg" alt="">
    </div>
    <form action="<?=BASEURL?>/login/new" method="post" class="form">
        <h1 class="title">Sign In</h1>
        <div class="input-container">
            <label for="username">Username</label>
            <input type="username" name="username" />
        </div>
        <div class="input-container">
            <label for="password">Password</label>
            <input type="password" name="password"  />
        </div>
        <button type="submit" class="btn btn-submit">Sign In</button>
        <p class="small-text">Not a member? <a href="<?=BASEURL;?>/register">Sign Up</a></p>
    </form>
</main>
<div class="col-md-4">
    <h2> inscription</h2>
    <form action="php/controller/registerHandler.php" method="POST" id="register">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="text" name="fisrtname" class="form-control" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="text" name="birthdate" class="form-control" placeholder="birthdate :YYYY/MM/DD" required>
        </div>  
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>  
        <input type="submit" name="register" class="btn btn-primary btn-block submit" value="Register">
    </form>
</div>
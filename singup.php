<?php
class signup{
    public function signup_form(){
        ?>
        <div class="container">
            <form action="signup.php" method="post"> 
                <div class="form-group"> 
                    <h2>Registration Form</h2>

                    <div class="signup"> 
                        <label for="fullname">Full Name:</label><br>
                        <input type="text" id="fullname" name="fullname" required><br><br>
                    </div>

                    <div class="signup">
                        <label for="username">Username:</label><br>
                        <input type="text" id="username" name="username" required><br><br>
                    </div>

                    <div class="signup">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" required><br><br>
                    </div>

                    <div class="signup">
                        <label for="password">Password:</label><br> 
                        <input type="password" id="password" name="password" required><br><br>
                    </div>

                    <div class="signup">
                        <input type="submit" value="Submit">
                    </div>

                </div> 
            </form>  
        </div>
        <?php
    }
}
?>


    

 
    <?php
    //Login
        session_start();
        $connection = mysqli_connect("localhost","root","");
        //$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
        $db = mysqli_select_db($connection, 'bloodlinenew');

        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM admin where username='$username' and password='$password'";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_fetch_array($query_run))
            {
                $_SESSION['username'] = $username;
                header('Location: home.php'); 
            }
            else
            {
                $_SESSION['status'] = "Username or Password is Invalid";
                header('Location: loginAdmin.php'); 
            }
        }

        ?>
        

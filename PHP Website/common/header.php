<header>
        <img src="http://localhost/CS340/phpmotors/images/site/logo.png" alt="PHP Logo">
        <?php
        if (isset($_SESSION['loggedin'])){

                if ($_SESSION['loggedin']){
                        $firstName = $_SESSION['clientData']['clientFirstname'];
                        echo "<a href= 'http://localhost/CS340/phpmotors/accounts/?action=adminView'>Welcome $firstName</a>";
                        echo "<a href='http://localhost/CS340/phpmotors/accounts/?action=Logout'>Logout</a>";
                }
                else if(!($_SESSION['loggedin'])){
                        
                        echo "<a href='http://localhost/CS340/phpmotors/accounts/?action=login'>My Account</a>";}

                }
        
        if (!(isset($_SESSION['loggedin']))){
                echo "<a href='http://localhost/CS340/phpmotors/accounts/?action=login'>My Account</a>";}
                ?>
</header>
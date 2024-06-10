<form action="del.php" method = 'post'>
                <input type="password" name = 'del'>
                <button type="submit" name = 'dels'>Delevery Details</button>
            </form>

<?php

                if(isset($_POST['dels'])){
                    $dpass = trim($_POST['del']);

                    if($dpass == 'dpass'){
                        header('location:del1.php');
                    }
                }

?>
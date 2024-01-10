<?php 
session_start();
session_unset();
session_destroy();

if ($_SESSION) {
    echo $_SESSION['user'] . " id=" . $_SESSION['userid'];
} else {
    echo "no session available";

    echo '<a href="data-weergeven.php" target="_blank"><button>End session</button><a/a>';
}
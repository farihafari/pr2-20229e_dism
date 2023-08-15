<?php
session_start();
session_unset();
echo"
<script>location.assign('signin.php')</script>
";
?>
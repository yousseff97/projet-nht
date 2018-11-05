<?php

if(isset($_POST['btnDelete'])){
    unset( $_SESSION['basket'][$_POST["btnDelete"]]);
}
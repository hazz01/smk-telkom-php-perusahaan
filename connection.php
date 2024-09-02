<?php

$conn=mysqli_connect('localhost', 'root', '', 'perusahaan');
if (mysqli_connect_errno()) {
    printf("Error to Connect: %s\n", mysqli_connect_error());
    exit();
}
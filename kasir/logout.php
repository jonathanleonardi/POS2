<?php
session_start();

// MENGHAPUS DATA SESSION
session_destroy();

header("location:login.php");
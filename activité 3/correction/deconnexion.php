<?php
require "config.php";
session_start();
session_destroy();
header('location:'.URL_SITE);
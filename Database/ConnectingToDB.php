<?php
/**
 * Created by Duncan Pogson - 1405466.
 * Date: 14/11/2016
 * Time: 15:07
 * Connect to groupD3 web app and select database
 */
$db = new mysqli(
    'eu-cdbr-azure-north-e.cloudapp.net'
    'b4defdb830e2bc'
    '44f41f1c'
    'cm3028_groupd3_db'
);
//test if connection was established and print any errors

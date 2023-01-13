<?php

/* -----------------------------------------------------------
| Helpers
---------------------------------------------------------- */

/**
 * @param string $url
 * 
 * @return void
 */
function redirect(string $url = "")
{

    header('Location:' . APP_URL . $url);
    die;
}


/**
 * @param string $message
 * 
 * @return void
 */
function alert(string $message, string $to = "")
{

    if (!$to) {

        $to = APP_URL;
    }

    echo "<script> alert('$message'); window.location.replace(' " . $to . " '); </script>";
}


/**
 * @return bool
 */
function checkAuth()
{

    return isset($_SESSION['user']);
}


/**
 * @param mixed $request
 * 
 * @return mixed
 */
function filterRequest($request)
{

    return htmlspecialchars($request);
}


/**
 * @param mixed $results
 * 
 * @return array
 */
function fetch($results)
{
    $temp = [];

    while ($row = mysqli_fetch_assoc($results)) {

        array_push($temp, $row);
    }

    return $temp;
}

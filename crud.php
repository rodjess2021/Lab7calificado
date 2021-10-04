<?php
include_once 'db.php';

if(isset($_POST['save']))
{
    $añ = $MySQLiconn->real_escape_string($_POST['añ']);
    $au = $MySQLiconn->real_escape_string($_POST['au']);
    $ti = $MySQLiconn->real_escape_string($_POST['ti']);
    $url = $MySQLiconn->real_escape_string($_POST['url']);
    $es = $MySQLiconn->real_escape_string($_POST['es']);
    $ed = $MySQLiconn->real_escape_string($_POST['ed']);

    $SQL = $MySQLiconn->query("INSERT INTO datos(añ,au,ti,url,es,ed)
    VALUES('$añ','$au','$ti','$url','$es','$ed')");

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM datos WHERE id=".$_GET['del']);
    header("Location: index.php");
}


if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM datos WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();

}


if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE datos SET añ='".$_POST['añ']."', au='".$_POST['au']."', ti='".$_POST['ti']."', url='".$_POST['url']."',
    es='".$_POST['es']."', ed='".$_POST['ed']."' WHERE id=".$_GET['edit']);
    header("Location: index.php");
}

?>
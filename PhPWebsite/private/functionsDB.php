<?php

function getUserData($id)
{
    $db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');

    $array = array();
    $query = "SELECT * FROM gebruikers WHERE cid = '$id'";
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $array['cid'] = $row['cid'];
        $array['cusername'] = $row['cusername'];
        $array['cemail'] = $row['cemail'];
        $array['cfirstname'] = $row['cfirstname'];
        $array['clastname'] = $row['clastname'];
        $array['cphonenumber'] = $row['cphonenumber'];
        $array['cadress'] = $row['cadress'];
    }
    return $array;
}

function getId($username)
{
    $db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');

    $query = "SELECT cid FROM gebruikers WHERE cusername = '".$username."'";
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        return $row['cid'];
    }

}
?>
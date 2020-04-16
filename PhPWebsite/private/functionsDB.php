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

//function getOrders($username) {
//
 //   $db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');
//
  //  $query = "SELECT * FROM orders WHERE userName = '".$username."'";
//
  //  echo $query;
 //   $result = mysqli_query($db, $query);
 //   while($row = mysqli_fetch_assoc($result))
  //  {
  //      return json_decode($row['tickets']);
  //      return $row['userName'];
   // }
//}

function getOrders($username)
{
    $db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');

    $array = array();
    $query = "SELECT * FROM orders WHERE userName = '$username'";
    $result = mysqli_query($db, $query);
    $finalArray = [];
    while($row = mysqli_fetch_assoc($result))
    {
        //print_r(json_decode($row['tickets']));
        foreach(json_decode($row['tickets']) as $ticket){
            array_push($finalArray, $ticket);
        }
 
    }

    //print_r($finalArray);
    return $finalArray;
}

function getDatum($username1)
{
    $db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');

    $array = array();
    $query = "SELECT * FROM orders WHERE userName = '$username1'";
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $array['date'] = $row['date'];
    }
    return $array;
}

?>
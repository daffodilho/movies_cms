<?php

function createUser($fname, $username, $password, $email){
    $pdo = Database::getInstance()->getConnection(); // we need our db connected

    // my code
    // $data = [
    //     ':fname' => $fname,
    //     ':username' => $username,
    //     ':password' => $password,
    //     ':email' => $email
    // ];
    // $sql = "INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email) VALUES (:fname, :username, :password, :email)";
    // $stmt= $pdo->prepare($sql);
    // $stmt->execute($data);

    // pan's code
    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email)';
    $create_user_query .= ' VALUES(:fname, :username, :password, :email)';
    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email
        )
    );

    // based on the execution result, if everything goes through
    // redirect to the index.php
    // otherwise, return an error message
    if($create_user_result){
        redirect_to('index.php');
    }else{
        return 'This individual sucks!';
    }
}
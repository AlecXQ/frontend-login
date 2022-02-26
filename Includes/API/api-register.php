<?php

function project_api_register(){
    
    register_rest_route(
        "project",
        "register",
        array(
            'methods' => 'POST',
            'callback' => 'project_register_callback'
        )
        );
}




function project_register_callback($request){

    $is_user_already = get_user_by("login",$request["name"]);
    $is_email_already = get_user_by("email",$request["email"]);

    if($is_user_already){
        return array("msg" => "There's already a user with that name");
    }elseif($is_email_already){
        return array("msg" => "There's already a user with that email");
    }

    $args = array(
        "user_login" => $request["name"],
        "user_pass" => $request["password"],
        "user_email" => $request["email"],
        "role"       => "editor"
    );

    $user = wp_insert_user($args);
    return array("msg" => "The user was created successfully",
        "User" => $user
        );
}

add_action("rest_api_init", "project_api_register");
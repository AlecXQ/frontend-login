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


function project_api_login(){
    
    register_rest_route(
        "project",
        "login",
        array(
            'methods' => 'POST',
            'callback' => 'project_login_callback'
        )
        );
}

function project_login_callback(){
    return "Login test API";
}

function project_register_callback($request){
    return $request->get_params();
}
add_action("rest_api_init","project_api_login");

add_action("rest_api_init", "project_api_register");
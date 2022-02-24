<?php

function project_api_register(){
    
    register_rest_route(
        "project",
        "register",
        array(
            'methods' => 'GET',
            'callback' => 'project_register_callback'
        )
        );
}

function project_register_callback(){
    return "My first custom API wp";
}

add_action("rest_api_init", "project_api_register");
<?php

function project_api_register(){
    // Creamos nuestra API de registro. Namespace: project, Endpoint: register. 
    // wordpress.com/wp-json/project/register
    // El metodo por el cual recibe parametros es el POST
    # Se ejecuta el callback de registro cuando se establezca comunicación con nuestra API 
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

    // Verificamos que no exista un usuario con el mismo nombre o contraseña
    $is_user_already = get_user_by("login",$request["name"]);
    $is_email_already = get_user_by("email",$request["email"]);
    // Se verifica el valor guardado, en caso de ser true, el usuario ya existe
    if($is_user_already){
        return array("msg" => "There's already a user with that name");
    }elseif($is_email_already){
        return array("msg" => "There's already a user with that email");
    }
    //Creamos un array que contiene los parametros necesarios para crear un usuario segun la API de wordpress
    $args = array(
        "user_login" => $request["name"],
        "user_pass" => $request["password"],
        "user_email" => $request["email"],
        "role"       => "editor"
    );
    //Agregamos al usuario, usando los parametros anteriores. Retornamos un array de respuesta
    $user = wp_insert_user($args);
    return array("msg" => "The user was created successfully",
        "User" => $user
        );
}

// Agregamos una accion: cuando se inicialice la API REST de Wordpress, se agregará nuestra API de registro.
add_action("rest_api_init", "project_api_register");
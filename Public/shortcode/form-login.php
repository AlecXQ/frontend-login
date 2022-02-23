<?php 

function project_script_login(){
    wp_register_script("project-login", plugins_url("../assets/js/login.js",__FILE__));
}

function project_style_login(){
    	
    wp_enqueue_style('style',plugins_url('style.css',__FILE__));
}

add_action('wp_enqueue_style', 'project_style_login');
add_action("wp_enqueue_scripts","project_script_login");

function project_add_login_form(){
    
    wp_enqueue_script("project-login");
    wp_enqueue_style('style');
    $response = '
    <main class="signin">
        <div class="signin__container">
        <h1>Login</h1>
            <form class="signin__form" id="signin">
                <div class="signin__email name--campo">
                    <label for="email">Email address</label>
                    <input name="email" type="email" id="email">
                </div>
                <div class="signin__pass name--campo">
                    <label for="password">Password</label>
                    <input name="password" type="password" id="password">
                </div>
                <div class="signin__submit">
                    <input type="submit" value="Log in">
                </div>
                <div class="signin_create-link">
                    <a href="'.home_url("sign-up").'">Sign up</a>
                </div>
                <div class="msg"></div>
            </form>
        </div>
    </main>
    ';

    return $response;
}

add_shortcode("project_login","project_add_login_form");
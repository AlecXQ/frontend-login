window.addEventListener("DOMContentLoaded", function(){
    console.log("Loaded");
    let $form = document.querySelector("#signup");
    let $message = document.querySelector(".msg");

    $form.addEventListener("submit",function(e){
        e.preventDefault();

        //Traemos los datos del formulario en clave y valor
        let datos = new FormData($form);
        //Convertimos los datos de manera que wordpress los entienda
        let datosParse = new URLSearchParams(datos);
        // enviamos los datos usando la API
        fetch("http://localhost/wordpress/wp-json/project/register",
        {
            method: "POST",
            body: datosParse
        }
        )
        .then(res => res.json())
        .then(json=> {
            console.log(json)
            $message.innerHTML = json?.msg;
        })
        .catch(err=>{
            console.log(`There's an error ${err}`);
            
        })
    })
})
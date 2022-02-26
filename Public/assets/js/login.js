window.addEventListener("DOMContentLoaded", function(){
    console.log("loaded");

    let $form = document.querySelector("#signin");
    
    $form.addEventListener("submit",function(e){
        e.preventDefault();

        let datos = new FormData($form);

        let datosParse = new URLSearchParams(datos);

        fetch("http://localhost/wordpress/wp-json/project/login",
        {
            method: "POST",
            body: datosParse
        }
        )
        .then(res => res.json())
        .then(json => {
            console.log(json)
        })
        .catch(err =>{
            console.log(`There's an error ${err}`);
        })
    })
})
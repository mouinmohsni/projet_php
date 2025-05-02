const drop_eria = document.getElementById("uploadBox")
const image_input = document.getElementById("imageInput")
const view_image = document.getElementById("preview")

image_input.addEventListener("change", uploadimage)


function uploadimage(){
    let image_link = URL.createObjectURL(image_input.files[0])
    console.log('drop_eria' , drop_eria.querySelector("p"))
    const p_in_drop = drop_eria.querySelector("p");
    view_image.src = image_link;
    p_in_drop.style.display = "none";


}
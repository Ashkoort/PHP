var supp = document.getElementById("sup");
supp.addEventListener("click",confirmation);

function confirmation(){
let val = confirm("êtes vous sur de vouloir supprimer se produit ?");

if(val!=true){
    event.preventDefault();
}

}
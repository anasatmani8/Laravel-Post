// Insertions des elements dans le PDF

function afficherPDF(){
    
    var nom = document.querySelector('.form-nom').value;
    var famille = document.querySelector('.form-famille').value;;
    var produit = document.querySelector('.form-produit').value;;
    var quantite = document.querySelector('.form-quantite').value;;
    var prix = document.querySelector('.form-prix').value;;
    var body = document.querySelector('body');
    body.innerHTML = ` 
    <div style="background-color: #18f; margin-left: 230px;" class="piece">

    <div class="logo">
        <img src="https://www.bagstoreshop.com/img/bag-store-shop-logo-1641288553.jpg" >
  
    </div>
    <h1>Facture </h1>
<div style="margin-left: 350px;" class="element">
   <p>Nom: <strong>Test</strong> </p>
   <p>Famille: <strong>Test</strong> </p>
   <p>Produit: <strong>Test</strong> </p>
   <p>Quanite: <strong>Test</strong> </p>
   <p>Prix: <strong>Test</strong> </p>
   <div class="certification">
       <img src="https://www.bagstoreshop.com/img/bag-store-shop-logo-1641288553.jpg"> <br>
        <p1>BagStoreShop</p1><br>
        <p2 id="current_date"></p2>
    </div>

</div>
</div>
<div class="generateurBtn">
    <button class="sublit"> Telecharger PDF</button>
</div>`
    
}
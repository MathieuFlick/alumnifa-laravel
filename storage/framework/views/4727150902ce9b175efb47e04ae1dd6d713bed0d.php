<?php $__env->startSection('title', 'Annuaire'); ?>
<?php $__env->startSection('content'); ?>
<div id="recherche">
    <form>
        <input id="reinit" class="submit_recherche" type="submit" value="Voir tous les membres" name="reinit">
    </form>
    <form id="form_recherche" method="POST">
        <input id="input_recherche" type="text" name="search" id="recherche" placeholder="Rechercher dans l'annuaire" >
        <input class="submit_recherche" type="submit" value="Rechercher" name="submit">
    </form>
</div>
<section id="membres">
    <div class="ficheMembre">
        <div class="divphoto">
            <img class="photo" src="" width="">
        </div>
    <p class=""></p>
    <a href="">Voir le profil</a></div>
    
    <div id="" class='modal' aria-hidden="true" role="dialog" aria-labelledby="title_modal" style="display:none">
        <div class="modal-wrapper js-modal-stop">
            <button class="js-modal-close">Retour</button>
            <h3 id="title_modal">profil de </h3>
            <ul>
                <li>Prénom :</li>
                <li>Nom : </li>
                <li>Pseudo: </li>
                <li>Contact : <a href=""><img src=""></a></li>
                <li>Poste occupé : </li>
                <li>Entreprise actuelle : </li> 
            </ul>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alumnifa\resources\views/directory.blade.php ENDPATH**/ ?>
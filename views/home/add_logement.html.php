<?php

use App\AppRepoManager;
use Core\Session\Session; ?>


<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un logement à la location</h2>
    <?php include PATH_ROOT . '/views/_templates/_message.html.php' ?>
    <form action="/add_logement_form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?= Session::get(Session::USER)->id ?>">
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input class="form-control form-control-custom" id="title" name="title" rows="3" ></input>
                </div>
                 <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control form-control-custom" id="description" name="description" rows="3" ></input>
                </div>
                <div class="form-group">
                    <label for="country">Pays</label>
                    <input type="text" class="form-control form-control-custom" id="country" name="country" >
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control form-control-custom" id="city" name="city" >
                </div>
                <div class="form-group">
                    <label for="zip_code">Code postal</label>
                    <input type="text" class="form-control form-control-custom" id="zip_code" name="zip_code" >
                </div>
                <div class="form-group">
                    <label for="adress">Nom de rue</label>
                    <input type="text" class="form-control form-control-custom" id="adress" name="adress" >
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" class="form-control form-control-custom" id="phone" name="phone" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="size">Taille du logement (m²)</label>
                    <input type="number" class="form-control form-control-custom" id="size" name="size" >
                </div>
               
                <div class="form-group">
                    <label for="nb_room">Nombre de chambres</label>
                    <input type="number" class="form-control form-control-custom" id="nb_room" name="nb_room" >
                </div>
                <div class="form-group">
                    <label for="nb_bed">Nombre de lits</label>
                    <input type="number" class="form-control form-control-custom" id="nb_bed" name="nb_bed" >
                </div>
                <div class="form-group">
                    <label for="nb_bath">Nombre de salles de bain</label>
                    <input type="number" class="form-control form-control-custom" id="nb_bath" name="nb_bath" >
                </div>
                <div class="form-group">
                    <label for="nb_traveler">Nombre de voyageurs</label>
                    <input type="number" class="form-control form-control-custom" id="nb_traveler" name="nb_traveler" >
                </div>
                <div class="form-group">
                    <label for="price_per_night">Prix par nuit (€)</label>
                    <input type="number" class="form-control form-control-custom" id="price_per_night" name="price_per_night" >
                </div>
            </div>
        </div>

        <div class="type-logement">
            <label for="type_logement_id">Type de logement</label>
            <div>
                <?php foreach (AppRepoManager::getRm()->getTypeLogementRepository()->getAllTypes() as $type) : ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type_logement_id" value="<?= $type->id ?>">
                        <label class="form-check-label"><?= $type->label ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="form-group add-photos">
            <label for="photos">Photos du logement</label>
            <input type="file" class="form-control-file" id="photos" name="photos" multiple>
            <small class="form-text text-muted">Sélectionnez une ou plusieurs photos (formats acceptés : JPG, JPEG, PNG, GIF).</small>
        </div>
        <div class="form-group">
            <h3 class="sub-title">Equipements :</h3>
            <div class="row">
                <?php foreach (AppRepoManager::getRm()->getEquipementRepository()->getEquipementActiveBylabel() as $label => $equipements) : ?>
                    <div class="col-md-4">
                        <h5><?= ucfirst($label) ?></h5>
                        <?php foreach ($equipements as $equipement) : ?>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="equipements[]" value="<?= $equipement->id ?>">
                                <label class="form-check-label" for="equipement<?= $equipement->id ?>">
                                    <img src="/assets/icons/icons/<?= $equipement->image_path ?>" alt="<?= $equipement->label ?>" style="width: 24px; height: 24px; margin-right: 8px;">                       
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="btn-send">
            <button type="submit" class="btn">Envoyer</button>
        </div>
    </form>
</div>
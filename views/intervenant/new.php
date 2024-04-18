<!-- Heading for adding an intervenant -->
<h2 class="text-center">Ajouter un Intervenant</h2>

<form action="path_to_your_handling_script.php" method="post" class="row">
    <input type="hidden" name="token" value="<?= $token; ?>">

    <!-- Name input field -->
    <div class="form-group col-6">
        <label for="nom">Nom</label>
        <input type="text" name="nom" class="form-control" id="nom" required>
    </div>
    
    <!-- First name input field -->
    <div class="form-group col-6">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" class="form-control" id="prenom" required>
    </div>
    
    <!-- Affectation input field -->
    <div class="form-group col-6">
        <label for="affectation">Affectation</label>
        <input type="text" name="affectation" class="form-control" id="affectation">
    </div>
    
    <!-- Web page URL input field -->
    <div class="form-group col-6">
        <label for="urlWeb">Page Web</label>
        <input type="text" name="urlWeb" class="form-control" id="urlWeb">
    </div>

    <!-- Seminaire selection dropdown -->
    <div class="col-6 form-group">
        <label for="id_intervenant">Select Related Seminar</label>
        <select name="id_seminaire" class="form-control" id="id_seminar" required>
            <option value="">Please select a Séminaire</option>
            <?php foreach ($seminairs as $semin): ?>
                <option value="<?= $inter->getId() ?>"><?= htmlspecialchars($inter->getTitre()) . ' ' . htmlspecialchars($inter->getLieu()) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary col-2 m-3">Ajouter</button>
</form>

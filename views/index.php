<h2 class="text-center">Liste des Séminaires</h2>

<div class="row mt-3 justify-content-around">
    <?php foreach($seminaires as $seminaire): ?>
        <div class="card col-3 m-1 p-1">
            <!-- Assuming there's a method to get an image; if not, this will need to be added or adjusted -->
            <div class="w-100">
                <img src="<?= $seminaire->getImageUrl() ?>" class="img-fluid" alt="Image du séminaire">
            </div>

            <div class="card-body">
                <h3 class="card-title"><?= htmlspecialchars($seminaire->getTitre()) ?></h3>
                <!-- Additional seminar information like date and location -->
                <p class="card-text"><?= htmlspecialchars($seminaire->getDateIntervention()) ?></p>
                <p class="card-text"><?= htmlspecialchars($seminaire->getLieu()) ?></p>
            </div>

            <!-- Link to view seminar details -->
            <a class="btn btn-outline-success" href="?actionSeminaire=detail&id=<?= $seminaire->getId() ?>">Détail du séminaire</a>

        </div> 
    <?php endforeach; ?>
</div>

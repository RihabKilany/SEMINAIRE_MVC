x<!-- Heading for the list of seminars -->
<h2 class="text-center">Liste des Séminaires</h2>

<!-- Table structure for displaying seminar data -->
<table class="table table-striped">
    <!-- Table header row, defining the data columns for the seminars -->
    <tr class="table-dark">
        <td>Titre</td> <!-- Column header for seminar's title -->
        <td>Résumé</td> <!-- Column header for seminar's summary -->
        <td>Lieu</td> <!-- Column header for seminar's location -->
        <td>Date</td> <!-- Column header for seminar's date -->
        <td>Action</td> <!-- Column header for actions (edit, delete) -->
    </tr>

    <!-- PHP loop through each seminar passed to the view -->
    <?php foreach ($seminaires as $seminaire): ?>
        <tr>
            <!-- Display seminar's title, using htmlspecialchars to prevent XSS attacks -->
            <td><?= htmlspecialchars($seminaire->getTitre()); ?></td>
            <!-- Display seminar's summary, using htmlspecialchars to prevent XSS attacks -->
            <td><?= htmlspecialchars($seminaire->getResume()); ?></td>
            <!-- Display seminar's location, using htmlspecialchars to prevent XSS attacks -->
            <td><?= htmlspecialchars($seminaire->getLieu()); ?></td>
            <!-- Display seminar's date -->
            <td><?= htmlspecialchars($seminaire->getDateIntervention()); ?></td>
            <td>
                <!-- Link to update the seminar's information -->
                <a href="?actionSeminaire=update&id=<?= $seminaire->getId(); ?>" class="btn btn-primary">Modifier</a>
                <!-- Form to submit a request for deleting a seminar -->
                <form action="?actionSeminaire=delete&id=<?= $seminaire->getId(); ?>" method="post" class="d-inline">
                    <!-- Hidden field to carry the CSRF token for secure form submission -->
                    <input type="hidden" name="token" value="<?= $token; ?>">
                    <!-- Submit button for the form, styled as a danger button for deletion -->
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Heading for the list of intervenants -->
<h2 class="text-center">Liste des Intervenants</h2>

<table class="table table-striped">
    <tr class="table-dark">
        <td>Nom</td>
        <td>Prénom</td>
        <td>Affectation</td>
        <td>Page Web</td>
        <td>Action</td>
    </tr>
    <?php foreach ($intervenants as $intervenant): ?>
    <tr>
        <td><?= htmlspecialchars($intervenant->getNom()); ?></td>
        <td><?= htmlspecialchars($intervenant->getPrenom()); ?></td>
        <td><?= htmlspecialchars($intervenant->getAffectation()); ?></td>
        <td><a href="<?= htmlspecialchars($intervenant->getUrlWeb()); ?>" target="_blank">Page Web</a></td>
        <td>
            <a href="?actionIntervenant=update&id=<?= $intervenant->getId(); ?>" class="btn btn-primary">Modifier</a>
            <form action="?actionIntervenant=delete&id=<?= $intervenant->getId(); ?>" method="post" class="d-inline">
                <input type="hidden" name="token" value="<?= $token; ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

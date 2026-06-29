<div class="flex-1 p-10">

    <h2 class="text-center text-3xl font-bold text-gray-700 mb-10">
        Liste des tâches
    </h2>



    <div class="flex justify-between mb-8">

        <form class="flex gap-3" action="<?= WEBROOT ?>?controller=taches&page=filtre" method="post">
            <input
                type="text"
                placeholder="Filtrer par nom..."
                class="border rounded-lg p-2 w-60 focus:ring-2 focus:ring-blue-500"
                name=statut>

            <button
                class="bg-gray-700 text-white px-5 rounded-lg hover:bg-gray-800"
                name="filtre">
                Filtrer
            </button>

        </form>


        <a href="<?= WEBROOT ?>?controller=taches&page=ajout" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            Ajouter
        </a>

    </div>



    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-800 text-white">
                <tr>
                    <th class="p-4 text-left">Nom</th>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Description</th>
                    <th class="p-4 text-left">Statut</th>
                    <th class="p-4 text-center">Action</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">
                <?php foreach ($taches  as $key => $tache): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4"><?= $tache["nom"] ?></td>
                        <td class="p-4"><?= $tache["date_echeance"] ?></td>
                        <td class="p-4"><?= $tache["description"] ?></td>
                        <td class="p-4 text-yellow-600 font-semibold"><?= $tache["statut"] ?></td>

                        <td class="p-4 text-center space-x-4">

                            <a href="<?= WEBROOT ?>?controller=taches&page=update&id=<?= $tache['id'] ?>" class="text-green-500 hover:text-green-700">
                                <i class="fa-solid fa-check"></i>
                            </a>

                            <a href="<?= WEBROOT ?>?controller=taches&page=detail&id=<?= $tache['id'] ?>" class="text-gray-600 hover:text-black">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="<?= WEBROOT ?>?controller=taches&page=supprimer&id=<?= $tache['id'] ?>" class="text-red-500 hover:text-red-700">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</div>


<?php if ($totalPages > 1): ?>
    <div class="flex justify-center items-center gap-2 mt-8">

        <?php if ($currentPage > 1): ?>
            <a href="<?= WEBROOT ?>?controller=taches&page=listeTaches&p=<?= $currentPage - 1 ?>"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                Précédent
            </a>
        <?php else: ?>
            <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                Précédent
            </span>
        <?php endif; ?>

        <div class="flex gap-1">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="<?= WEBROOT ?>?controller=taches&page=listeTaches&p=<?= $i ?>"
                    class="px-4 py-2 rounded-lg font-semibold tra</div>nsition <?= $i === $currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>

        <?php if ($currentPage < $totalPages): ?>
            <a href="<?= WEBROOT ?>?controller=taches&page=listeTaches&p=<?= $currentPage + 1 ?>"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                Suivant
            </a>
        <?php else: ?>
            <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                Suivant
            </span>
        <?php endif; ?>

    </div>
<?php endif; ?>
</body>

</html>
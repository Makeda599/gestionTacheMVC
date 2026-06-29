<div class="flex-1 flex flex-col items-center justify-center p-10">

    <h2 class="text-3xl font-bold text-gray-700 mb-10">
        DETAIL TACHE
    </h2>



    <div class="bg-white shadow-xl rounded-xl p-8 w-[450px]">

        <div class="space-y-4 text-gray-700">

            <div class="flex justify-between">
                <span class="font-semibold">Nom :</span>
                <span><?= $tache["nom"] ?></span>
            </div>

            <div class="flex justify-between">
                <span class="font-semibold">Description :</span>
                <span><?= $tache["description"] ?></span>
            </div>

            <div class="flex justify-between">
                <span class="font-semibold">Date :</span>
                <span><?= $tache["date_echeance"] ?></span>
            </div>

            <div class="flex justify-between items-center">
                <span class="font-semibold">Statut :</span>

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                    <?= $tache["statut"] ?>
                </span>
            </div>

        </div>



        <div class="flex justify-end gap-5 mt-8 text-lg">

            <a href="<?= WEBROOT ?>?controller=taches&page=update&id=<?= $tache['id'] ?>" class="text-green-500 hover:text-green-700">
                <i class="fa-solid fa-check"></i>
            </a>

            <a href="<?= WEBROOT ?>?controller=taches&page=modifier&id=<?= $tache['id'] ?>" class="text-blue-500 hover:text-blue-700">
                <i class="fa-solid fa-pen"></i>
            </a>

            <a href="<?= WEBROOT ?>?controller=taches&page=supprimer&id=<?= $tache['id'] ?>" class="text-red-500 hover:text-red-700">
                <i class="fa-solid fa-trash"></i>
            </a>

        </div>

    </div>


    <a href="<?= WEBROOT ?>?controller=taches&page=listeTaches" class="mt-6 text-blue-600 hover:underline">
        ← Retour à la liste
    </a>

</div>

</body>

</html>
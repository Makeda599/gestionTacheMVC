<div class="flex-1 flex flex-col justify-center items-center p-10">

    <div class="bg-white p-10 rounded-xl shadow-xl w-[500px]">

        <h2 class="text-center text-2xl font-bold mb-8 text-gray-700">
            <?= isset($save['id']) ? "FORMULAIRE DE MODIFICATION" : "FORMULAIRE D'AJOUT TACHE" ?>
        </h2>

        <form class="space-y-6" action="<?=WEBROOT?>?controller=taches&page=<?= isset($save['id']) ? 'modifier&id='.$save['id'] : 'ajout' ?>" method="post">
            
            <?php if(isset($save['id'])): ?>
                <input type="hidden" name="id" value="<?= $save['id'] ?>">
            <?php endif; ?>

            <div>
                <h5 class="text-red-500"><?= $errors["nom"] ?? "" ?></h5>
                <label class="text-gray-600">Nom</label>
                <input
                    type="text"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Nom de la tâche"
                    name="nom"
                    value="<?= $save["nom"] ?? "" ?>">
            </div>
            
            <div>
                <h5 class="text-red-500"><?= $errors["date_echeance"] ?? "" ?></h5>
                <label class="text-gray-600">Date</label>
                <input
                    type="date"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="date_echeance"
                    value="<?= $save["date_echeance"] ?? "" ?>">
            </div>
            
            <div>
                <h5 class="text-red-500"><?= $errors["description"] ?? "" ?></h5>
                <label class="text-gray-600">Description</label>
                <textarea
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4"
                    placeholder="Description"
                    name="description"><?= $save["description"] ?? "" ?></textarea>
            </div>

            <button
                class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                name="envoyer">
                Enregistrer
            </button>
        </form>

    </div>

    <a href="<?=WEBROOT?>?controller=taches&page=listeTaches" class="mt-6 text-blue-600 hover:underline">
        ← Retour à la liste
    </a>

</div>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 flex min-h-screen">

    <div class="w-64 bg-slate-900 text-white p-6 flex-shrink-0">
        <h1 class="text-2xl font-bold mb-10">Dashboard</h1>
        <nav class="space-y-4">
            <a href="<?=WEBROOT?>?controller=taches&page=ajout" class="flex items-center gap-3 hover:bg-slate-700 p-3 rounded">
                <i class="fa-solid fa-plus"></i>
                Ajout tâche
            </a>
            <a href="<?=WEBROOT?>?controller=taches&page=listeTaches" class="flex items-center gap-3 hover:bg-slate-700 p-3 rounded">
                <i class="fa-solid fa-list"></i>
                Liste
            </a>
        </nav>
    </div>

    <div class="flex-1 min-h-screen overflow-y-auto">
        <?= $content; ?>
    </div>

</body>
</html>
<?php
$title = "Atualizar raça";
include ROOT . "/app/views/partials/header1.php";
?>

<header class="bg-transparent pt-20">
    
</header>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg mb-12">
            <div class="p-6 text-gray-900 text-center">
                <form action="?router=Racas/atualizar" method="post">
                    <?php
                        foreach ($edit as $raca) {
                    ?>
                            <h5 class="mt-2 mb-8 text-3xl font-bold tracking-tight text-gray-900">Atualizar raça</h5>
                            <div class="mt-2 grid grid-cols-12 gap-4 content-center text-left">
                                <div class="col-span-12 md:col-span-12">
                                    <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="hidden" name="r_id" value="<?php echo $raca['r_id']; ?>">
                                        <label for="r_tipos" class="block mb-2 text-sm font-medium text-gray-900">Espécie</label>
                                        <select name="r_tipos" id="r_tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autofocus required>
                                            <?php
                                                foreach ($especies as $especie) {
                                            ?>
                                                    <option value="<?php echo $especie['t_id'] ?>" <?php if ($especie['t_id'] == $raca['r_tipos']) echo "selected"; ?> ><?php echo $especie['t_nome'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <label for="r_nome" class="block mb-2 text-sm font-medium text-gray-900">Raça</label>
                                        <input type="text" name="r_nome" id="r_nome" value="<?php echo $raca['r_nome'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
                                    </div>
                                </div>
                                    <div class="mt-4 flex flex-col sm:flex-row justify-end items-center gap-4">
                                        <button type="submit" class="w-full sm:w-auto uppercase text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-16 py-2.5 text-center">Salvar</button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
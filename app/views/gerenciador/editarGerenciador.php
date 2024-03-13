<?php
$title = "Atualizar gerenciador";
include ROOT . "/app/views/partials/header1.php";
?>

<header class="bg-transparent pt-20">
    
</header>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg mb-12">
            <div class="p-6 text-gray-900 text-center">
                <form action="?router=Gerenciadores/atualizar" method="post">
                    <?php
                        foreach ($edit as $gerenciador) {
                    ?>
                            <h5 class="mt-2 mb-8 text-3xl font-bold tracking-tight text-gray-900">Atualizar gerenciador</h5>
                            <div class="mt-2 grid grid-cols-12 gap-4 content-center text-left">
                                <div class="col-span-12 md:col-span-12">
                                    <div class="grid md:grid-cols-2 md:gap-6">
                                        <input type="hidden" value="<?php echo $gerenciador['g_id'] ?>" name="g_id">
                                        <div class="relative z-0 w-full mb-5 group">
                                            <label for="g_nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                                            <input type="text" name="g_nome" id="g_nome" value="<?php echo $gerenciador['g_nome'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required autofocus/>
                                        </div>
                                        <div class="relative z-0 w-full mb-5 group">
                                            <label for="g_email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                                            <input type="email" name="g_email" id="g_email" value="<?php echo $gerenciador['g_email'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-2 md:gap-6">
                                        <div class="relative z-0 w-full mb-5 group">
                                            <label for="g_senha" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                                            <input type="password" name="g_senha" id="g_senha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                        </div>
                                        <div class="relative z-0 w-full mb-5 group">
                                            <label for="confirmar_senha" class="block mb-2 text-sm font-medium text-gray-900">Confirme a Senha</label>
                                            <input type="password" name="confirmar_senha" id="confirmar_senha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                        </div>
                                    </div>
                                    <div class="mt-4 flex flex-col sm:flex-row justify-end items-center gap-4">
                                        <button type="submit" class="w-full sm:w-auto uppercase text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-16 py-2.5 text-center">Salvar</button>
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
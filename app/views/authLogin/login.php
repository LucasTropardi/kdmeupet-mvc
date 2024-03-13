<?php
$title = "Login";
include ROOT . "/app/views/partials/header1.php";
?>

<div class="py-20 sm:py-0">
    <section class="bg-transparent">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Acessar sua conta
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="?router=AuthLogin/processaLogin" method="post">
                        <div>
                            <label for="u_email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                            <input type="email" name="u_email" id="u_email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="u_senha" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                            <input type="password" name="u_senha" id="u_senha" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        
                        <p class="text-sm font-light text-gray-700">
                            Ainda não possui cadastro? <a href="?router=AuthLogin/cadastrar" class="font-medium text-primary-700 hover:underline">Acesse aqui</a>
                        </p>
                        <button type="submit" class="uppercase w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-sm shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
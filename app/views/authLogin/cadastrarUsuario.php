<?php
$title = "Cadastre-se";
include ROOT . "/app/views/partials/header1.php";
?>
<header class="bg-transparent pt-20">
    <style>
        .user-photo {
            width: 120px; /* Largura fixa */
            height: 120px; /* Altura fixa */
            border-radius: 50%; /* Torna a foto circular */
            object-fit: cover; /* Garante que a imagem cubra o espaço, cortando o excesso */
        }
    </style>
</header>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg mb-12">
            <div class="p-6 text-gray-900 text-center">
                <form action="?router=AuthLogin/cadastrar" enctype="multipart/form-data" method="post">
                    <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900">Cadastre-se</h5>
                    <div class="mt-2 grid grid-cols-12 gap-4 content-center text-left">
                        <div class="col-span-12 md:col-span-12">
                        <div class="relative flex flex-col items-center justify-center mb-5">
                            <img src="/assets/images/unknown.png" alt="usuário" class="user-photo rounded-full mb-3 border-gray-700 border-2">
                            <label for="file_input" class="absolute bottom-0 cursor-pointer">
                                <i class="fa-solid fa-plus text-white text-lg font-medium bg-blue-600 hover:bg-blue-700 rounded-full p-2"></i>
                            </label>
                            <input type="file" id="file_input" name="u_foto" class="hidden" />
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="u_nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                                    <input type="text" name="u_nome" id="u_nome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required autofocus/>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="u_sobrenome" class="block mb-2 text-sm font-medium text-gray-900">Sobrenome</label>
                                    <input type="text" name="u_sobrenome" id="u_sobrenome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                </div>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <label for="u_email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                                <input type="email" name="u_email" id="u_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="u_senha" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                                    <input type="password" name="u_senha" id="u_senha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="confirmar_senha" class="block mb-2 text-sm font-medium text-gray-900">Confirme a Senha</label>
                                    <input type="password" name="confirmar_senha" id="confirmar_senha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="u_telefone" class="block mb-2 text-sm font-medium text-gray-900">Telefone</label>
                                    <input type="tel" name="u_telefone" id="u_telefone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="(18) 98765-4321" required />
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="u_data" class="block mb-2 text-sm font-medium text-gray-900">Data de Cadastro</label>
                                    <input type="text" name="u_data" id="u_data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo date('d/m/Y') ?>" readonly required />
                                </div>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <label for="u_endereco" class="block mb-2 text-sm font-medium text-gray-900">Endereço</label>
                                <input type="text" name="u_endereco" id="u_endereco" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
                            </div>
                            <div class="mt-4 flex flex-col sm:flex-row justify-between items-center gap-4">
                                <p class="text-sm font-light text-gray-700">
                                    Já possui cadastro? <a href="?router=AuthLogin/login" class="font-medium text-primary-600 hover:underline">Acesse aqui</a>
                                </p>
                                <button type="submit" class="w-full sm:w-auto uppercase text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-16 py-2.5 text-center">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#u_data').datepicker({
                dateFormat: 'dd/mm/yy'
            }).mask('00/00/0000');

            // Define a data de hoje como o valor do campo
            $('#u_data').datepicker('setDate', new Date());

            $('#u_telefone').mask('(00) 00000-0000');

            // Evento ao mudar o valor do campo de arquivo
            $('#file_input').change(function(event) {
                var reader = new FileReader(); // Cria um novo FileReader
                
                reader.onload = function(e) {
                    // Quando o arquivo for lido, define a URL da imagem
                    $('img[alt="usuário"]').attr('src', e.target.result);
                };
                
                // Lê o arquivo selecionado
                reader.readAsDataURL(event.target.files[0]);
            });
        });
    </script>
</div>
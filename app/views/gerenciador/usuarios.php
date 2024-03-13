<?php
    $title = "Usuários";
    include ROOT . "/app/views/partials/header1.php";
?>
<header class="bg-transparent pt-20">
    <div class="font-semibold text-3xl text-gray-100 leading-tight text-center max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="p-4 mt-1">
            Lista de usuários
        </h2>
    </div>
</header>

<div class="py-8 max-w-7xl mx-auto">
    <div class="bg-transparent overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-gray-100text-gray-700 text-center rounded-lg">
            <div class="bg-gray-300 shadow sm:rounded-lg p-1.5">
                <div class="bg-blue-300 shadow sm:rounded-lg p-1.5">
                    <div class="bg-gray-100 shadow sm:rounded-lg p-1.5">
                        <div class="mt-2 gap-4 content-center">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-4">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nome
                                        </th>
                                        <th scope="col" class="px-6 py-3 sm:table-cell hidden">
                                            Cadastro
                                        </th>
                                        <th scope="col" class="px-6 py-3 sm:table-cell hidden">
                                            Telefone
                                        </th>
                                        <th scope="col" class="px-6 py-3 sm:table-cell hidden">
                                            Endereço
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($usuarios as $usuario) { 
                                    ?>
                                            <tr class="bg-white border-b hover:bg-gray-50">
                                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                                    <?php
                                                        if ($usuario['u_foto'] != '') {
                                                            $foto = "/storage/users/" . $usuario['u_foto'];
                                                        } else {
                                                            $foto = "/assets/images/unknown.png";
                                                        }
                                                    ?>
                                                    <img class="w-10 h-10 rounded-full" src="<?php echo $foto ?>" alt="Jese image">
                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold"><?php echo $usuario['u_nome'] . ' ' . $usuario['u_sobrenome'] ?></div>
                                                        <div class="font-normal text-gray-500"><?php echo $usuario['u_email'] ?></div>
                                                    </div>  
                                                </th>
                                                <td class="px-6 py-4 sm:table-cell hidden">
                                                    <?php echo date('d/m/Y', strtotime($usuario['u_data'])) ?>
                                                </td>
                                                <td class="px-6 py-4 sm:table-cell hidden">
                                                    <div class="flex items-center">
                                                        <?php echo $usuario['u_telefone'] ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 sm:table-cell hidden">
                                                    <?php echo $usuario['u_endereco'] ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
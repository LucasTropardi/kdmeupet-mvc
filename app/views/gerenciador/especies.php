<?php
    $title = "Espécies";
    include ROOT . "/app/views/partials/header1.php";
?>
<header class="bg-transparent pt-20">
    <div class="font-semibold text-3xl text-gray-100 leading-tight text-center max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="p-4 mt-1">
            Lista de espécies
        </h2>
    </div>
</header>

<div class="py-8 max-w-7xl mx-auto">
    <div class="bg-transparent overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-gray-100 text-gray-700 text-center rounded-lg"> <!-- Corrigido: espaço adicionado em bg-gray-100text-gray-700 -->
            <div class="bg-gray-300 shadow sm:rounded-lg p-1.5">
                <div class="bg-blue-300 shadow sm:rounded-lg p-1.5">
                    <div class="bg-gray-100 shadow sm:rounded-lg p-1.5">
                        <!-- Contêiner do Botão, alinhado à esquerda -->
                        <div class="text-left py-4 px-6">
                            <a href="?router=Especies/criar" class="block sm:inline-block w-full sm:w-auto uppercase text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-16 py-2.5 text-center">
                                <i class="fa-solid fa-plus mr-2"></i>Adicionar
                            </a>
                        </div>
                        <!-- Tabela abaixo do botão -->
                        <div class="mt-2 gap-4 content-center">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-4">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 sm:table-cell hidden">Id</th>
                                        <th scope="col" class="px-6 py-3">Nome</th>
                                        <th scope="col" class="px-6 py-3 text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($especies as $especie) { 
                                    ?>
                                            <tr class="bg-white border-b hover:bg-gray-50">
                                                <td class="px-6 py-4 sm:table-cell hidden">
                                                    <div class="flex items-center">
                                                        <?php echo $especie['t_id'] ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php echo $especie['t_nome'] ?>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <a href="?router=Especies/editar/&id=<?php echo base64_encode($especie['t_id']); ?>" title="Editar" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-1 py-0.5 text-center ml-2 sm:ml-0 me-0.5 mb-0">
                                                        <i class="fa-solid fa-pencil ml-0.5"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="if(confirm('Deseja realmente excluir esta espécie?')){ window.location.href='?router=Especies/deletar/&id=<?php echo base64_encode($especie['t_id']); ?>'; }" title="Excluir" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 sm:px-2 py-0.5 text-center me-2 mb-2 sm:ml-2">
                                                        <i class="fa-solid fa-power-off"></i>
                                                    </a>
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
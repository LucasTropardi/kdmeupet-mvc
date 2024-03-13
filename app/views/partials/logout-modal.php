<!-- Overlay/Background -->
<div id="modalOverlay" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"></div>

<!-- Modal -->
<div id="modal" class="hidden fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 w-full max-w-md h-auto bg-white rounded-lg shadow z-50">
    <!-- Header da Modal -->
    <div class="modal-header flex justify-end items-center pb-3">
        <div class="modal-close cursor-pointer">
            <svg class="fill-current text-gray-600 modal-close cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
            </svg>
        </div>
    </div>
    <div class="grid justify-items-center p-1 mb-2">
        <img src="/assets/images/warning-icon.png" alt="Logo" width="70">
    </div>
    <!-- Corpo da Modal -->
    <div class="modal-body text-gray-600 py-4 mb-4">
        <p class="text-2xl text-center font-bold text-gray-600">Tem certeza que deseja sair?</p>
    </div>
    <!-- Rodapé da Modal -->
    <div class="modal-footer flex justify-end pt-2">
        <button id="closeModal" class="uppercase px-4 bg-transparent p-3 rounded-lg text-gray-600 hover:bg-gray-200 mr-2">Cancelar</button>
        <button id="confirmLogout" class="uppercase px-12 bg-red-500 p-3 rounded-lg text-white hover:bg-red-600">Sim</button>
    </div>
</div>
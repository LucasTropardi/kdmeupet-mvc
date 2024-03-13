<nav class="bg-blue-500 border-gray-200 fixed top-0 w-full z-50 sm:px-6 lg:px-8">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="?router=Site/home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/assets/images/navbar-logow.png" alt="Logo"  width="165">
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse mr-4">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-2 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Abrir menu login</span>
                <img src="/assets/images/user-login.png" alt="Login" width="40">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-blue-500 divide-y divide-blue-600 rounded-lg shadow" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm font-medium text-gray-100">Acessos</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="?router=AuthLogin/login" class="block px-4 py-2 text-sm font-medium text-gray-100 hover:bg-gray-100 hover:text-gray-700">Login</a>
                    </li>
                    <li>
                        <a href="?router=AuthLogin/cadastrar" class="block px-4 py-2 text-sm font-medium text-gray-100 hover:bg-gray-100 hover:text-gray-700">Cadastre-se</a>
                    </li>
                    <li>
                        <a href="?router=AuthGerenciador/login" class="block px-4 py-2 text-sm font-medium text-gray-100 hover:bg-gray-100 hover:text-gray-700">Gerenciadores</a>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-500 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-blue-500">
                <li>
                    <a href="?router=Site/achados" class="block text-lg py-2 px-3 text-white rounded hover:bg-blue-500 md:hover:bg-transparent md:hover:text-gray-700 md:p-0">Achados</a>
                </li>
                <li>
                    <a href="?router=Site/perdidos" class="block text-lg py-2 px-3 text-white rounded hover:bg-blue-500 md:hover:bg-transparent md:hover:text-gray-700 md:p-0">Perdidos</a>
                </li>
                <li>
                    <a href="?router=Site/adotar" class="block text-lg py-2 px-3 text-white rounded hover:bg-blue-500 md:hover:bg-transparent md:hover:text-gray-700 md:p-0">Adotar</a>
                </li>
                <li>
                    <a href="?router=Site/parcerias" class="block text-lg py-2 px-3 text-white rounded hover:bg-blue-500 md:hover:bg-transparent md:hover:text-gray-700 md:p-0">Parcerias</a>
                </li>
                <li>
                    <a href="?router=Site/localizacoes" class="block text-lg py-2 px-3 text-white rounded hover:bg-blue-500 md:hover:bg-transparent md:hover:text-gray-700 md:p-0">Localizações</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
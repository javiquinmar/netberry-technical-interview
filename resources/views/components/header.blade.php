<header>
    <nav class="bg-branch-500 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-12 xl:space-x-16">
					<!-- Website Logo -->
                    <div>
                        <a href="#" class="flex items-center py-4 px-2">
                            <img src="https://www.netberry.es/wp-content/uploads/2021/03/logo_netberry-01.png">
                        </a>
                    </div>
                    <!-- Primary Navbar items -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="/" class="primary-nav-items">Inicio</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-3 ">
                    <img class="inline-block h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <!-- Mobile menu button -->
                <div id="icon-mobile-menu" class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class=" w-6 h-6 text-white hover:text-blue-100 hover:scale-110 transition-all"
                            x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div id="mobile-menu" class="hidden mobile-menu absolute w-full">
            <div class="flex justify-end">
                <ul class="w-2/3 text-center text-white bg-branch-900 rounded-b-lg">
                    <li class="active">
                      <a href="/" class="primary-nav-items-mobile">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>

        <script>
            const btn  = document.querySelector("button.mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");

            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });

            window.addEventListener('click', function(e){
                if (!btn.contains(e.target) && (!menu.contains(e.target))){
					menu.classList.add("hidden");
              	} 
            })
        </script>
    </nav>
</header>

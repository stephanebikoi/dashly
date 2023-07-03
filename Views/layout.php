<!DOCTYPE html>
<html lang="en" data-theme="light"  data-sidebar-behaviour="fixed" data-navigation-color="inverted" data-is-fluid="true">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Webinning" name="author">
    
        <link rel="stylesheet" href="/css/theme.bundle.css" id="stylesheetLTR">
        <link rel="stylesheet" href="/css/theme.rtl.bundle.css" id="stylesheetRTL">
        <link rel="stylesheet" href="/css/custom.css">
        <link rel="stylesheet" href="/css/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="/css/fonts/fontawesome.min.css">
        <script src="/js/script.js"></script>
        
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap">
        <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap">
        
        <!-- no-JS fallback -->
        <noscript>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap">
        </noscript>
        

        <script>
         // Theme switcher
        
            let themeSwitcher = document.getElementById('themeSwitcher');
            
            const getPreferredTheme = () => {
                if (localStorage.getItem('theme') != null) {
                    return localStorage.getItem('theme');
                }
        
                return document.documentElement.dataset.theme;
            };
        
            const setTheme = function (theme) {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                } else {
                    document.documentElement.dataset.theme = theme;
                }
        
                localStorage.setItem('theme', theme);
            };
        
            const showActiveTheme = theme => {
                const activeBtn = document.querySelector(`[data-theme-value="${theme}"]`);
        
                document.querySelectorAll('[data-theme-value]').forEach(element => {
                    element.classList.remove('active');
                });
        
                activeBtn && activeBtn.classList.add('active');
        
             // Set button if demo mode is enabled
                document.querySelectorAll('[data-theme-control="theme"]').forEach(element => {
                    if (element.value == theme) {
                        element.checked = true;
                    }
                });
            };
        
            function reloadpage() {
                window.location = window.location.pathname;
            }
        
        
            setTheme(getPreferredTheme());
        
            if(typeof themeSwitcher != 'undefined') {
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                    if(localStorage.getItem('theme') != null) {
                        if (localStorage.getItem('theme') == 'auto') {
                            reloadpage();
                        }
                    }
                });
        
                window.addEventListener('load', () => {
                    showActiveTheme(getPreferredTheme());
                    
                    document.querySelectorAll('[data-theme-value]').forEach(element => {
                        element.addEventListener('click', () => {
                            const theme = element.getAttribute('data-theme-value');
        
                            localStorage.setItem('theme', theme);
                            reloadpage();
                        })
                    })
                });
            }
        </script>
        <!-- Favicon -->
        <link rel="icon" href="/favicon/favicon.ico" sizes="any">
        
            <!-- Demo script -->
            <script>
                var themeConfig = {
                    theme: JSON.parse('"light"'),
                    isRTL: JSON.parse('false'),
                    isFluid: JSON.parse('true'),
                    sidebarBehaviour: JSON.parse('"fixed"'),
                    navigationColor: JSON.parse('"inverted"')
                };
                
                var isRTL = localStorage.getItem('isRTL') === 'true',
                    isFluid = localStorage.getItem('isFluid') === 'true',
                    theme = localStorage.getItem('theme'),
                    sidebarSizing = localStorage.getItem('sidebarSizing'),
                    linkLTR = document.getElementById('stylesheetLTR'),
                    linkRTL = document.getElementById('stylesheetRTL'),
                    html = document.documentElement;
        
                if (isRTL) {
                    linkLTR.setAttribute('disabled', '');
                    linkRTL.removeAttribute('disabled');
                    html.setAttribute('dir', 'rtl');
                } else {
                    linkRTL.setAttribute('disabled', '');
                    linkLTR.removeAttribute('disabled');
                    html.removeAttribute('dir');
                }
            </script>
        
        <!-- Page Title -->
        <title>Dashly | <?= $pageTitle ?></title>
    </head>
    
    <body>

        <!-- THEME CONFIGURATION -->
        <script>
            let themeAttrs = document.documentElement.dataset;
        
            for(let attr in themeAttrs) {
                if(localStorage.getItem(attr) != null) {
                    document.documentElement.dataset[attr] = localStorage.getItem(attr);
        
                    if (theme === 'auto') {
                        document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        
                        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                            e.matches ? document.documentElement.dataset.theme = 'dark' : document.documentElement.dataset.theme = 'light';
                        });
                    }
                }
            }
        </script>
        

        
        <!-- NAVIGATION -->
            <nav id="mainNavbar" class="navbar navbar-vertical navbar-expand-lg scrollbar bg-dark navbar-dark">
                
                <!-- Theme configuration (navbar) -->
                    <script>
                        let navigationColor = localStorage.getItem('navigationColor'),
                        navbar = document.getElementById('mainNavbar');
                
                        if(navigationColor != null && navbar != null) {
                            if(navigationColor == 'inverted') {
                                navbar.classList.add('bg-dark', 'navbar-dark');
                                navbar.classList.remove('bg-white', 'navbar-light');
                            } else {
                                navbar.classList.add('bg-white', 'navbar-light');
                                navbar.classList.remove('bg-dark', 'navbar-dark');
                            }
                        }
                    </script>    
                    <div class="container-fluid">
                    
                    <!-- Brand -->
                    <a class="navbar-brand" href="index.html">
                        <img src="https://d33wubrfki0l68.cloudfront.net/33193ecc0db7caa7d7efee3dca8af1b145fa2135/16978/assets/images/logo-small.svg" class="navbar-brand-img logo-light logo-small" alt="..." width="19" height="25">
                        <img src="https://d33wubrfki0l68.cloudfront.net/ba6b91b7d508187d153e48318c22d0773a9cedfc/36afa/assets/images/logo.svg" class="navbar-brand-img logo-light logo-large" alt="..." width="125" height="25">
            
                        <img src="https://d33wubrfki0l68.cloudfront.net/8b6c92837e3b7aa8c9017d33298ead6b9b859d79/fa79b/assets/images/logo-dark-small.svg" class="navbar-brand-img logo-dark logo-small" alt="..." width="19" height="25">
                        <img src="https://d33wubrfki0l68.cloudfront.net/55307694d1a6b107d2d87c838a1aaede85cd3d84/66f18/assets/images/logo-dark.svg" class="navbar-brand-img logo-dark logo-large" alt="..." width="125" height="25">
                    </a>
        
                    <!-- Navbar toggler -->
                    <a href="javascript: void(0);" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#sidenavCollapse" aria-controls="sidenavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </a>
            
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenavCollapse">
            
                        <!-- Navigation -->
                        <ul class="navbar-nav mb-lg-7">
                            <li class="nav-item dropdown">
                                <a class="nav-link active" href="#dashboardsCollapse" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="dashboardsCollapse">
                                    <svg viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M3.753,13.944v8.25h6v-6a1.5,1.5,0,0,1,1.5-1.5h1.5a1.5,1.5,0,0,1,1.5,1.5v6h6v-8.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M.753,12.444,10.942,2.255a1.5,1.5,0,0,1,2.122,0L23.253,12.444" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                    <span>Dashboards</span>
                                </a>
                                <div class="collapse show" id="dashboardsCollapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="/dashboards" class="nav-link active">
                                                <span>Default</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/dashboards/my_profil" class="nav-link">
                                                <span>My profil</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/dashboards/my_project" class="nav-link">
                                                <span>My project</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/dashboards/my_task" class="nav-link">
                                                <span>My task</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#emailCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="emailCollapse">
                                <i class="fa fa-users nav-link-icon" aria-hidden="true"></i>
                                    <span>Staffs</span>
                                </a>
                                <div class="collapse " id="emailCollapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="/staffs" class="nav-link ">
                                                <span>all staffs</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/staffs/Form_staff" class="nav-link ">
                                                <span>add staffs</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/staffs/all_fonction" class="nav-link ">
                                                <span>all function</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/staffs/all_poste" class="nav-link ">
                                                <span>all poste</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#authenticationSignUpCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="authenticationSignUpCollapse">
                                    <i class="fa fa-folder nav-link-icon" aria-hidden="true"></i>
                                    <span>Projets</span>
                                </a>
                                <div class="collapse " id="authenticationSignUpCollapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="/projects" class="nav-link ">
                                                <span>all projets</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/projects/Form_project" class="nav-link ">
                                                <span>add projet</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/projects/all_category" class="nav-link ">
                                                <span>all categories</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#categories" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="categories">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.25 10.511H10.5"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.25 14.261H8.25"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.25 18.011H8.25"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 23.25H2.25C1.85218 23.25 1.47064 23.092 1.18934 22.8107C0.908035 22.5294 0.75 22.1478 0.75 21.75V6C0.75 5.60218 0.908035 5.22064 1.18934 4.93934C1.47064 4.65804 1.85218 4.5 2.25 4.5H6C6 3.50544 6.39509 2.55161 7.09835 1.84835C7.80161 1.14509 8.75544 0.75 9.75 0.75C10.7446 0.75 11.6984 1.14509 12.4017 1.84835C13.1049 2.55161 13.5 3.50544 13.5 4.5H17.25C17.6478 4.5 18.0294 4.65804 18.3107 4.93934C18.592 5.22064 18.75 5.60218 18.75 6V8.25"/><path stroke="currentColor" stroke-width="1.5" d="M9.75 4.51099C9.54289 4.51099 9.375 4.34309 9.375 4.13599C9.375 3.92888 9.54289 3.76099 9.75 3.76099"/><path stroke="currentColor" stroke-width="1.5" d="M9.75 4.51099C9.95711 4.51099 10.125 4.34309 10.125 4.13599C10.125 3.92888 9.95711 3.76099 9.75 3.76099"/><g><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 23.25C20.5637 23.25 23.25 20.5637 23.25 17.25C23.25 13.9363 20.5637 11.25 17.25 11.25C13.9363 11.25 11.25 13.9363 11.25 17.25C11.25 20.5637 13.9363 23.25 17.25 23.25Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.9239 15.505L17.0189 19.379C16.9543 19.4649 16.8721 19.536 16.7776 19.5873C16.6832 19.6387 16.5789 19.6692 16.4717 19.6768C16.3645 19.6844 16.2569 19.6689 16.1562 19.6313C16.0555 19.5937 15.964 19.535 15.8879 19.459L14.3879 17.959"/></g></svg>
                                    <span>Tasks</span>
                                </a>
                                <div class="collapse " id="categories">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="/tasks" class="nav-link ">
                                                <span>all tasks</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/tasks/Form_task" class="nav-link ">
                                                <span>add task</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#pagesCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pagesCollapse">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><title>common-file-double-1</title><path class="a" d="M17.25,23.25H3.75a1.5,1.5,0,0,1-1.5-1.5V5.25"/><rect class="a" x="5.25" y="0.75" width="16.5" height="19.5" rx="1" ry="1"/></svg>
                                    <span>administration</span>
                                </a>
                                <div class="collapse " id="pagesCollapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="account.html" class="nav-link ">
                                                <span>Account</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="user.html" class="nav-link ">
                                                <span>User</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pricing.html" class="nav-link ">
                                                <span>Pricing</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="wizard.html" class="nav-link ">
                                                <span>Wizard</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="help-center.html" class="nav-link ">
                                                <span>Help Center</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="invoice.html" class="nav-link ">
                                                <span>Invoice</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="api-keys.html" class="nav-link ">
                                                <span>API Keys</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="maintenance.html" class="nav-link ">
                                                <span>Maintenance</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="connect-apps.html" class="nav-link ">
                                                <span>Connect Apps</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="landing.html" class="nav-link ">
                                                <span>Landing Page</span>
                                                <span class="badge text-bg-success rounded-pill ms-auto">New</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="chat.html">
                                    <svg viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M11.25,18.75a1.5,1.5,0,0,1-1.5-1.5V9.75a1.5,1.5,0,0,1,1.5-1.5h10.5a1.5,1.5,0,0,1,1.5,1.5v7.5a1.5,1.5,0,0,1-1.5,1.5h-1.5v4.5l-4.5-4.5Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M6.75,12.75l-3,3v-4.5H2.25a1.5,1.5,0,0,1-1.5-1.5V2.25A1.5,1.5,0,0,1,2.25.75h10.5a1.5,1.5,0,0,1,1.5,1.5v3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                    <span>Chat</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="calendar.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><title>calendar</title><rect class="a" x="0.752" y="3.75" width="22.5" height="19.5" rx="1.5" ry="1.5"/><line class="a" x1="0.752" y1="9.75" x2="23.252" y2="9.75"/><line class="a" x1="6.752" y1="6" x2="6.752" y2="0.75"/><line class="a" x1="17.252" y1="6" x2="17.252" y2="0.75"/></svg>
                                    <span>Calendar</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#emailCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="emailCollapse">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><title>envelope</title><rect class="a" x="0.75" y="4.5" width="22.5" height="15" rx="1.5" ry="1.5"/><line class="a" x1="15.687" y1="9.975" x2="19.5" y2="13.5"/><line class="a" x1="8.313" y1="9.975" x2="4.5" y2="13.5"/><path class="a" d="M22.88,5.014l-9.513,6.56a2.406,2.406,0,0,1-2.734,0L1.12,5.014"/></svg>
                                    <span>Email</span>
                                </a>
                                <div class="collapse " id="emailCollapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="inbox.html" class="nav-link ">
                                                <span>Inbox</span>
                                                <span class="badge text-bg-primary badge-circle ms-3">7</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="read-email.html" class="nav-link ">
                                                <span>Read Email</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#tasksCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="tasksCollapse">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.25 10.511H10.5"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.25 14.261H8.25"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.25 18.011H8.25"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 23.25H2.25C1.85218 23.25 1.47064 23.092 1.18934 22.8107C0.908035 22.5294 0.75 22.1478 0.75 21.75V6C0.75 5.60218 0.908035 5.22064 1.18934 4.93934C1.47064 4.65804 1.85218 4.5 2.25 4.5H6C6 3.50544 6.39509 2.55161 7.09835 1.84835C7.80161 1.14509 8.75544 0.75 9.75 0.75C10.7446 0.75 11.6984 1.14509 12.4017 1.84835C13.1049 2.55161 13.5 3.50544 13.5 4.5H17.25C17.6478 4.5 18.0294 4.65804 18.3107 4.93934C18.592 5.22064 18.75 5.60218 18.75 6V8.25"/><path stroke="currentColor" stroke-width="1.5" d="M9.75 4.51099C9.54289 4.51099 9.375 4.34309 9.375 4.13599C9.375 3.92888 9.54289 3.76099 9.75 3.76099"/><path stroke="currentColor" stroke-width="1.5" d="M9.75 4.51099C9.95711 4.51099 10.125 4.34309 10.125 4.13599C10.125 3.92888 9.95711 3.76099 9.75 3.76099"/><g><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 23.25C20.5637 23.25 23.25 20.5637 23.25 17.25C23.25 13.9363 20.5637 11.25 17.25 11.25C13.9363 11.25 11.25 13.9363 11.25 17.25C11.25 20.5637 13.9363 23.25 17.25 23.25Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.9239 15.505L17.0189 19.379C16.9543 19.4649 16.8721 19.536 16.7776 19.5873C16.6832 19.6387 16.5789 19.6692 16.4717 19.6768C16.3645 19.6844 16.2569 19.6689 16.1562 19.6313C16.0555 19.5937 15.964 19.535 15.8879 19.459L14.3879 17.959"/></g></svg>
                                    <span>Tasks</span>
                                </a>
                                <div class="collapse " id="tasksCollapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="kanban-board.html" class="nav-link ">
                                                <span>Kanban Board</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="task-details.html" class="nav-link ">
                                                <span>Task Details</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item w-100">
                                <hr>
                            </li>
                            <li class="nav-item">
                                <a href="docs/index.html" class="nav-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><path d="M22.627 14.87 15 22.5l-3.75.75.75-3.75 7.631-7.63a2.113 2.113 0 0 1 2.991 0l.009.008a2.116 2.116 0 0 1-.004 2.992zM8.246 20.25h-6a1.5 1.5 0 0 1-1.5-1.5V2.25a1.5 1.5 0 0 1 1.5-1.5h15a1.5 1.5 0 0 1 1.5 1.5V9m-10.5-3.75h6m-9 4.5h9m-9 4.5h7.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                    <span>Documentation</span>
                                    <span class="badge text-bg-primary rounded-pill ms-auto">v1.4</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="docs/accordion.html" class="nav-link">
                                    <svg viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M22.91,6.953,12.7,1.672a1.543,1.543,0,0,0-1.416,0L1.076,6.953a.615.615,0,0,0,0,1.094l10.209,5.281a1.543,1.543,0,0,0,1.416,0L22.91,8.047a.616.616,0,0,0,0-1.094Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M.758,12.75l10.527,5.078a1.543,1.543,0,0,0,1.416,0L23.258,12.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M.758,17.25l10.527,5.078a1.543,1.543,0,0,0,1.416,0L23.258,17.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                    <span>Components</span>
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- End of Collapse -->
                </div>
            </nav>
            <main>
            <!-- MAIN CONTENT -->
            <header class="container-fluid d-flex py-6 mb-4 " >
            
            <!-- Search -->
            <form class="d-none d-md-inline-block me-auto">
                <div class="input-group input-group-merge">
        
                    <!-- Input -->
                    <input type="text" class="form-control bg-light-green border-light-green w-250px" placeholder="Search..." aria-label="Search for any term">
                    
                    <!-- Button -->
                    <span class="input-group-text bg-light-green border-light-green p-0">
        
                        <!-- Button -->
                        <button class="btn btn-primary rounded-2 w-30px h-30px p-0 mx-1" type="button" aria-label="Search button">
                            <svg viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M0.750 9.812 A9.063 9.063 0 1 0 18.876 9.812 A9.063 9.063 0 1 0 0.750 9.812 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(-3.056 4.62) rotate(-23.025)"  /><path d="M16.221 16.22L23.25 23.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                        </button>
                    </span>
                  </div>
            </form>
        
            <!-- Top buttons -->
            <div class="d-flex align-items-center ms-auto me-n1 me-lg-n2">
        
                <!-- Dropdown -->
                <div class="dropdown" id="themeSwitcher">
                    <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18"><g><path d="M12,4.64A7.36,7.36,0,1,0,19.36,12,7.37,7.37,0,0,0,12,4.64Zm0,12.72A5.36,5.36,0,1,1,17.36,12,5.37,5.37,0,0,1,12,17.36Z" style="fill: currentColor"/><path d="M12,3.47a1,1,0,0,0,1-1V1a1,1,0,0,0-2,0V2.47A1,1,0,0,0,12,3.47Z" style="fill: currentColor"/><path d="M4.55,6a1,1,0,0,0,.71.29A1,1,0,0,0,6,6,1,1,0,0,0,6,4.55l-1-1A1,1,0,0,0,3.51,4.93Z" style="fill: currentColor"/><path d="M2.47,11H1a1,1,0,0,0,0,2H2.47a1,1,0,1,0,0-2Z" style="fill: currentColor"/><path d="M4.55,18l-1,1a1,1,0,0,0,0,1.42,1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29l1-1A1,1,0,0,0,4.55,18Z" style="fill: currentColor"/><path d="M12,20.53a1,1,0,0,0-1,1V23a1,1,0,0,0,2,0V21.53A1,1,0,0,0,12,20.53Z" style="fill: currentColor"/><path d="M19.45,18A1,1,0,0,0,18,19.45l1,1a1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.42Z" style="fill: currentColor"/><path d="M23,11H21.53a1,1,0,0,0,0,2H23a1,1,0,0,0,0-2Z" style="fill: currentColor"/><path d="M18.74,6.26A1,1,0,0,0,19.45,6l1-1a1,1,0,1,0-1.42-1.42l-1,1A1,1,0,0,0,18,6,1,1,0,0,0,18.74,6.26Z" style="fill: currentColor"/></g></svg>
                    </a>
        
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <button type="button" class="dropdown-item active" data-theme-value="light">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><g><path d="M12,4.64A7.36,7.36,0,1,0,19.36,12,7.37,7.37,0,0,0,12,4.64Zm0,12.72A5.36,5.36,0,1,1,17.36,12,5.37,5.37,0,0,1,12,17.36Z" style="fill: currentColor"/><path d="M12,3.47a1,1,0,0,0,1-1V1a1,1,0,0,0-2,0V2.47A1,1,0,0,0,12,3.47Z" style="fill: currentColor"/><path d="M4.55,6a1,1,0,0,0,.71.29A1,1,0,0,0,6,6,1,1,0,0,0,6,4.55l-1-1A1,1,0,0,0,3.51,4.93Z" style="fill: currentColor"/><path d="M2.47,11H1a1,1,0,0,0,0,2H2.47a1,1,0,1,0,0-2Z" style="fill: currentColor"/><path d="M4.55,18l-1,1a1,1,0,0,0,0,1.42,1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29l1-1A1,1,0,0,0,4.55,18Z" style="fill: currentColor"/><path d="M12,20.53a1,1,0,0,0-1,1V23a1,1,0,0,0,2,0V21.53A1,1,0,0,0,12,20.53Z" style="fill: currentColor"/><path d="M19.45,18A1,1,0,0,0,18,19.45l1,1a1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.42Z" style="fill: currentColor"/><path d="M23,11H21.53a1,1,0,0,0,0,2H23a1,1,0,0,0,0-2Z" style="fill: currentColor"/><path d="M18.74,6.26A1,1,0,0,0,19.45,6l1-1a1,1,0,1,0-1.42-1.42l-1,1A1,1,0,0,0,18,6,1,1,0,0,0,18.74,6.26Z" style="fill: currentColor"/></g></svg>
                                Light mode
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item" data-theme-value="dark">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><path d="M19.57,23.34a1,1,0,0,0,0-1.9,9.94,9.94,0,0,1,0-18.88,1,1,0,0,0,.68-.94,1,1,0,0,0-.68-.95A11.58,11.58,0,0,0,8.88,2.18,12.33,12.33,0,0,0,3.75,12a12.31,12.31,0,0,0,5.11,9.79A11.49,11.49,0,0,0,15.61,24,12.55,12.55,0,0,0,19.57,23.34ZM10,20.17A10.29,10.29,0,0,1,5.75,12a10.32,10.32,0,0,1,4.3-8.19A9.34,9.34,0,0,1,15.59,2a.17.17,0,0,1,.17.13.18.18,0,0,1-.07.2,11.94,11.94,0,0,0-.18,19.21.25.25,0,0,1-.16.45A9.5,9.5,0,0,1,10,20.17Z" style="fill: currentColor"/></svg>
                                Dark mode
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item" data-theme-value="auto">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><path d="M24,12a1,1,0,0,0-1-1H19.09a.51.51,0,0,1-.49-.4,6.83,6.83,0,0,0-.94-2.28.5.5,0,0,1,.06-.63l2.77-2.76a1,1,0,1,0-1.42-1.42L16.31,6.28a.5.5,0,0,1-.63.06A6.83,6.83,0,0,0,13.4,5.4a.5.5,0,0,1-.4-.49V1a1,1,0,0,0-2,0V4.91a.51.51,0,0,1-.4.49,6.83,6.83,0,0,0-2.28.94.5.5,0,0,1-.63-.06L4.93,3.51A1,1,0,0,0,3.51,4.93L6.28,7.69a.5.5,0,0,1,.06.63A6.83,6.83,0,0,0,5.4,10.6a.5.5,0,0,1-.49.4H1a1,1,0,0,0,0,2H4.91a.51.51,0,0,1,.49.4,6.83,6.83,0,0,0,.94,2.28.5.5,0,0,1-.06.63L3.51,19.07a1,1,0,1,0,1.42,1.42l2.76-2.77a.5.5,0,0,1,.63-.06,6.83,6.83,0,0,0,2.28.94.5.5,0,0,1,.4.49V23a1,1,0,0,0,2,0V19.09a.51.51,0,0,1,.4-.49,6.83,6.83,0,0,0,2.28-.94.5.5,0,0,1,.63.06l2.76,2.77a1,1,0,1,0,1.42-1.42l-2.77-2.76a.5.5,0,0,1-.06-.63,6.83,6.83,0,0,0,.94-2.28.5.5,0,0,1,.49-.4H23A1,1,0,0,0,24,12Zm-8.74,2.5A5.76,5.76,0,0,1,9.5,8.74a5.66,5.66,0,0,1,.16-1.31A.49.49,0,0,1,10,7.07a5.36,5.36,0,0,1,1.8-.31,5.47,5.47,0,0,1,5.46,5.46,5.36,5.36,0,0,1-.31,1.8.49.49,0,0,1-.35.32A5.53,5.53,0,0,1,15.26,14.5Z" style="fill: currentColor"/></svg>
                                Auto
                            </button>
                        </li>
                    </ul>
                </div>
        
                <!-- Separator -->
                <div class="vr bg-gray-700 mx-2 mx-lg-3"></div>
        
                <!-- Dropdown -->
                <div class="dropdown">
                    <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
                        <span class="avatar avatar-circle avatar-xxs"><img class="avatar-img" src="https://d33wubrfki0l68.cloudfront.net/8ab0a140561aa1ea23abaa0101bd41b9b1d0cb12/e951b/assets/images/flags/1x1/us.svg" alt="..." width="18" height="18"></span>
                    </a>
        
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <h6 class="dropdown-header text-uppercase">Select language</h6>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="dropdown-item active">
                                <span class="avatar avatar-circle avatar-xxs"><img class="avatar-img" src="https://d33wubrfki0l68.cloudfront.net/8ab0a140561aa1ea23abaa0101bd41b9b1d0cb12/e951b/assets/images/flags/1x1/us.svg" alt="..." width="18" height="18"></span><span class="text-truncate ms-2">English (US)</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="dropdown-item">
                                <span class="avatar avatar-circle avatar-xxs"><img class="avatar-img" src="https://d33wubrfki0l68.cloudfront.net/7ee571bc59a0a1ac377631263167fb273a12a7d4/f112e/assets/images/flags/1x1/gb.svg" alt="..." width="18" height="18"></span><span class="text-truncate ms-2">English (UK)</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="dropdown-item">
                                <span class="avatar avatar-circle avatar-xxs"><img class="avatar-img" src="https://d33wubrfki0l68.cloudfront.net/719d768eaac30c30937cb72db78ce3391e33a5dc/05fb9/assets/images/flags/1x1/es.svg" alt="..." width="18" height="18"></span><span class="text-truncate ms-2">Español</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="dropdown-item">
                                <span class="avatar avatar-circle avatar-xxs"><img class="avatar-img" src="https://d33wubrfki0l68.cloudfront.net/423c01c313d4dd7ca6acd49b868069981490a9b7/c7155/assets/images/flags/1x1/fr.svg" alt="..." width="18" height="18"></span><span class="text-truncate ms-2">Française</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="dropdown-item">
                                <span class="avatar avatar-circle avatar-xxs"><img class="avatar-img" src="https://d33wubrfki0l68.cloudfront.net/ba8ec66c54af0ff852cdbee4794d3858176ac85e/419c1/assets/images/flags/1x1/de.svg" alt="..." width="18" height="18"></span><span class="text-truncate ms-2">Deutsch</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="dropdown-item">
                                <span class="avatar avatar-circle avatar-xxs"><img class="avatar-img" src="https://d33wubrfki0l68.cloudfront.net/c82251ff8fa03cc4eaaa6f972e7a9eb6f3d9380c/f62a5/assets/images/flags/1x1/cn.svg" alt="..." width="18" height="18"></span><span class="text-truncate ms-2">中文 (繁體)</span>
                            </a>
                        </li>
                    </ul>
                </div>
        
                <!-- Separator -->
                <div class="vr bg-gray-700 mx-2 mx-lg-3"></div>
        
                <!-- Button -->
                <a class="d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px position-relative link-secondary" data-bs-toggle="offcanvas" href="#offcanvasNotifications" role="button" aria-controls="offcanvasNotifications">
                    <svg viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M10,21.75a2.087,2.087,0,0,0,4.005,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M12 3L12 0.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M12,3a7.5,7.5,0,0,1,7.5,7.5c0,7.046,1.5,8.25,1.5,8.25H3s1.5-1.916,1.5-8.25A7.5,7.5,0,0,1,12,3Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                    <?php foreach ($notifications as $notification) : ?>
                        <?php if ($notification->destinataire === $_SESSION['id']){ ?>
                            <?= !empty($notifications) ? '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger">' . count($notifications)  .'<span class="visually-hidden">unread messages</span></span>' : '' ?>
                       <?php } ?>
                    <?php endforeach; ?>
                </a>
        
                <!-- Notifications offcanvas -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNotifications" aria-labelledby="offcanvasNotificationsLabel">
                    <div class="offcanvas-header px-5">
                        <h3 class="offcanvas-title" id="offcanvasNotificationsLabel">Notifications</h3>
                        
                        <div class="d-flex align-items-start">
                            <div class="dropdown">
                                <a href="javascript: void(0);" class="dropdown-toggle no-arrow w-20px h-20px me-2 text-body" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="16" width="16"><g><circle cx="3.25" cy="12" r="3.25" style="fill: currentColor"/><circle cx="12" cy="12" r="3.25" style="fill: currentColor"/><circle cx="20.75" cy="12" r="3.25" style="fill: currentColor"/></g></svg>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2 text-secondary" height="14" width="14"><g><path d="M23.22,2.06a1.49,1.49,0,0,0-2,.59l-8.5,15.43L6.46,11.29a1.5,1.5,0,1,0-2.21,2l7.64,8.34a1.52,1.52,0,0,0,2.42-.29L23.81,4.1A1.5,1.5,0,0,0,23.22,2.06Z" style="fill: currentColor"/><path d="M2.61,14.63a1.5,1.5,0,0,0-2.22,2l4.59,5a1.52,1.52,0,0,0,2.11.09,1.49,1.49,0,0,0,.1-2.12Z" style="fill: currentColor"/><path d="M10.3,13a1.41,1.41,0,0,0,2-.54L16.89,4.1a1.5,1.5,0,1,0-2.62-1.45L9.68,11A1.41,1.41,0,0,0,10.3,13Z" style="fill: currentColor"/></g></svg>
                                            Mark as all read
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2 text-secondary" height="14" width="14"><g><path d="M21.5,2.5H2.5a2,2,0,0,0-2,2v3a1,1,0,0,0,1,1h21a1,1,0,0,0,1-1v-3A2,2,0,0,0,21.5,2.5Z" style="fill: currentColor"/><path d="M21.5,10H2.5a1,1,0,0,0-1,1v8.5a2,2,0,0,0,2,2h17a2,2,0,0,0,2-2V11A1,1,0,0,0,21.5,10Zm-6.25,3.5A1.25,1.25,0,0,1,14,14.75H10a1.25,1.25,0,0,1,0-2.5h4A1.25,1.25,0,0,1,15.25,13.5Z" style="fill: currentColor"/></g></svg>
                                            Archive all
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2 text-secondary" height="14" width="14"><g><path d="M21,19.5a1,1,0,0,0,0-2A1.5,1.5,0,0,1,19.5,16V11.14a8.65,8.65,0,0,0-.4-2.62l-11,11Z" style="fill: currentColor"/><path d="M14.24,21H9.76a.25.25,0,0,0-.24.22,2.64,2.64,0,0,0,0,.28,2.5,2.5,0,0,0,5,0,2.64,2.64,0,0,0,0-.28A.25.25,0,0,0,14.24,21Z" style="fill: currentColor"/><path d="M1,24a1,1,0,0,0,.71-.28l22-22a1,1,0,0,0,0-1.42,1,1,0,0,0-1.42,0l-5,5A7.31,7.31,0,0,0,13,3.07V1a1,1,0,0,0-2,0V3.07a8,8,0,0,0-6.5,8.07V16A1.5,1.5,0,0,1,3,17.5a1,1,0,0,0,0,2h.09L.29,22.29a1,1,0,0,0,0,1.42A1,1,0,0,0,1,24Z" style="fill: currentColor"/></g></svg>
                                            Disable notifications
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2 text-secondary" height="14" width="14"><g><rect x="4.25" y="4.5" width="5.75" height="7.25" rx="1.25" style="fill: currentColor"/><path d="M24,10a3,3,0,0,0-3-3H19V2.5a2,2,0,0,0-2-2H2a2,2,0,0,0-2,2V20a3.5,3.5,0,0,0,3.5,3.5h17A3.5,3.5,0,0,0,24,20ZM3.5,21.5A1.5,1.5,0,0,1,2,20V3a.5.5,0,0,1,.5-.5h14A.5.5,0,0,1,17,3V20a3.51,3.51,0,0,0,.11.87.5.5,0,0,1-.09.44.49.49,0,0,1-.39.19ZM22,20a1.5,1.5,0,0,1-3,0V9.5a.5.5,0,0,1,.5-.5H21a1,1,0,0,1,1,1Z" style="fill: currentColor"/><rect x="12" y="6.05" width="3.5" height="2" rx="0.75" style="fill: currentColor"/><rect x="12" y="10.05" width="3.5" height="2" rx="0.75" style="fill: currentColor"/><rect x="4" y="14.05" width="11.5" height="2" rx="0.75" style="fill: currentColor"/><rect x="4" y="18.05" width="9" height="2" rx="0.75" style="fill: currentColor"/></g></svg>                              
                                            What's new?
                                        </a>
                                    </li>
                                </ul>
                            </div>
                
                            <!-- Button -->
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                    </div>
                    
                    <div class="offcanvas-body p-0">
                        <div class="list-group list-group-flush">
                            <?php if(count($notifications) >= 1) {
                                foreach ($notifications as $notifica) : ?>
                                    <a href="/projects/show_nofif/<?= $notifica->id ?>" class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="avatar avatar-circle avatar-xs me-2">
                                                <span class="avatar-title text-bg-info-soft">MN</span>
                                            </div>
                                            <div class="d-flex flex-column flex-grow-1">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1"><?= $notifica->destinataire ?></h5>
                                                    <?php 
                                                        //$dates = date('y-m-d');
                                                        //$diff = date_diff(date_create($dates), date_create($notifica->date));
                                                    ?>
                                                    
                                                    <small class="text-muted">
                                                        <?= $diff = \App\Models\Model::TimeElapsed($notifica->date) ?></small>
                                                </div>

                                                <div class="d-flex flex-column">
                                                    <p class="mb-1"><?= $notifica->message ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach;
                            } else { 
                                foreach ($notification as $notif) : ?>
                                    <a href="javascript: void(0);" class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="avatar avatar-circle avatar-xs me-2">
                                                <span class="avatar-title text-bg-info-soft">MN</span>
                                            </div>
                                            <div class="d-flex flex-column flex-grow-1">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1"><?= $notif->destinataire ?></h5>
                                                    <?php 
                                                        //$dates = date('y-m-d');
                                                        //$diff = date_diff(date_create($dates), date_create($notif->date));
                                                    ?>
                                                    
                                                    <small class="text-muted">
                                                        <?= $diff = \App\Models\Model::TimeElapsed($notif->date) ?></small>
                                                </div>

                                                <div class="d-flex flex-column">
                                                    <p class="mb-1"><?= $notif->message ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; 
                            } ?>
                        </div>
                    </div>
                </div>
                
                <!-- Button -->
                <a class="d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary" data-bs-toggle="offcanvas" href="#offcanvasCustomize" role="button" aria-controls="offcanvasCustomize">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="18" width="18" ><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.77069 9.50524C7.60364 9.43126 7.45391 9.32316 7.33112 9.18788L6.70112 8.48788C6.5212 8.28484 6.28225 8.14317 6.01778 8.08272C5.7533 8.02228 5.47654 8.0461 5.22627 8.15083C4.97601 8.25557 4.76478 8.43598 4.62219 8.66678C4.4796 8.89758 4.41279 9.16721 4.43112 9.43788V10.3679C4.44125 10.5505 4.41275 10.7331 4.34748 10.9039C4.28221 11.0747 4.18165 11.2298 4.05235 11.3591C3.92306 11.4884 3.76795 11.589 3.59714 11.6542C3.42634 11.7195 3.24369 11.748 3.06112 11.7379L2.12112 11.6879C1.85153 11.6753 1.58463 11.7463 1.35691 11.8911C1.12919 12.036 0.951762 12.2476 0.848892 12.4971C0.746023 12.7467 0.72273 13.0219 0.782196 13.2851C0.841663 13.5484 0.980987 13.7868 1.18112 13.9679L1.88112 14.5879C2.01927 14.7148 2.129 14.8695 2.20311 15.0419C2.27722 15.2142 2.31403 15.4003 2.31112 15.5879C2.31532 15.7757 2.2791 15.9621 2.2049 16.1347C2.13071 16.3072 2.02029 16.4618 1.88112 16.5879L1.18112 17.2179C0.981519 17.3992 0.842717 17.6376 0.783657 17.9007C0.724597 18.1638 0.748157 18.4387 0.85112 18.6879C0.954125 18.9362 1.13156 19.1464 1.359 19.2897C1.58644 19.433 1.8527 19.5022 2.12112 19.4879H3.06112C3.24369 19.4778 3.42634 19.5063 3.59714 19.5715C3.76795 19.6368 3.92306 19.7374 4.05235 19.8666C4.18165 19.9959 4.28221 20.1511 4.34748 20.3219C4.41275 20.4927 4.44125 20.6753 4.43112 20.8579V21.7879C4.4151 22.0577 4.48357 22.3258 4.62702 22.5549C4.77046 22.784 4.98174 22.9626 5.23147 23.066C5.48119 23.1694 5.75693 23.1925 6.02034 23.1318C6.28374 23.0712 6.5217 22.93 6.70112 22.7279L7.33112 22.0379C7.45391 21.9026 7.60364 21.7945 7.77069 21.7205C7.93775 21.6466 8.11842 21.6083 8.30112 21.6083C8.48382 21.6083 8.6645 21.6466 8.83155 21.7205C8.9986 21.7945 9.14833 21.9026 9.27112 22.0379L9.90112 22.7279C10.0805 22.93 10.3185 23.0712 10.5819 23.1318C10.8453 23.1925 11.1211 23.1694 11.3708 23.066C11.6205 22.9626 11.8318 22.784 11.9752 22.5549C12.1187 22.3258 12.1871 22.0577 12.1711 21.7879V20.8579C12.161 20.6753 12.1895 20.4927 12.2548 20.3219C12.32 20.1511 12.4206 19.9959 12.5499 19.8666C12.6792 19.7374 12.8343 19.6368 13.0051 19.5715C13.1759 19.5063 13.3586 19.4778 13.5411 19.4879H14.4811C14.7495 19.5022 15.0158 19.433 15.2432 19.2897C15.4707 19.1464 15.6481 18.9362 15.7511 18.6879C15.8541 18.4387 15.8776 18.1638 15.8186 17.9007C15.7595 17.6376 15.6207 17.3992 15.4211 17.2179L14.7211 16.5879C14.582 16.4618 14.4715 16.3072 14.3973 16.1347C14.3231 15.9621 14.2869 15.7757 14.2911 15.5879C14.2882 15.4003 14.325 15.2142 14.3991 15.0419C14.4732 14.8695 14.583 14.7148 14.7211 14.5879L15.4211 13.9679C15.6213 13.7868 15.7606 13.5484 15.82 13.2851C15.8795 13.0219 15.8562 12.7467 15.7533 12.4971C15.6505 12.2476 15.4731 12.036 15.2453 11.8911C15.0176 11.7463 14.7507 11.6753 14.4811 11.6879L13.5411 11.7379C13.3586 11.748 13.1759 11.7195 13.0051 11.6542C12.8343 11.589 12.6792 11.4884 12.5499 11.3591C12.4206 11.2298 12.32 11.0747 12.2548 10.9039C12.1895 10.7331 12.161 10.5505 12.1711 10.3679V9.43788C12.1895 9.16721 12.1226 8.89758 11.98 8.66678C11.8375 8.43598 11.6262 8.25557 11.376 8.15083C11.1257 8.0461 10.8489 8.02228 10.5845 8.08272C10.32 8.14317 10.081 8.28484 9.90112 8.48788L9.27112 9.18788C9.14833 9.32316 8.9986 9.43126 8.83155 9.50524C8.6645 9.57922 8.48382 9.61743 8.30112 9.61743C8.11842 9.61743 7.93775 9.57922 7.77069 9.50524Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.30114 17.4379C9.33944 17.4379 10.1811 16.5962 10.1811 15.5579C10.1811 14.5196 9.33944 13.6779 8.30114 13.6779C7.26285 13.6779 6.42114 14.5196 6.42114 15.5579C6.42114 16.5962 7.26285 17.4379 8.30114 17.4379Z"/><path stroke="currentColor" stroke-width="1.5" d="M18.1565 6.23828C17.8804 6.23828 17.6565 6.01442 17.6565 5.73828C17.6565 5.46214 17.8804 5.23828 18.1565 5.23828"/><path stroke="currentColor" stroke-width="1.5" d="M18.1565 6.23828C18.4326 6.23828 18.6565 6.01442 18.6565 5.73828C18.6565 5.46214 18.4326 5.23828 18.1565 5.23828"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.1347 1.83506C16.1409 1.62338 16.2152 1.41935 16.3466 1.25325C16.478 1.08716 16.6594 0.967851 16.8639 0.91304C17.0685 0.85823 17.2853 0.870838 17.4821 0.948992C17.6789 1.02715 17.8453 1.16668 17.9565 1.34689L18.551 2.30113C18.6493 2.45959 18.8042 2.57479 18.9842 2.62343C19.1643 2.67207 19.3561 2.65052 19.5209 2.56313L20.508 2.03729C20.6955 1.93854 20.9096 1.90249 21.1191 1.93443C21.3285 1.96638 21.5222 2.06463 21.6716 2.21476C21.8211 2.3649 21.9185 2.559 21.9495 2.76857C21.9805 2.97814 21.9435 3.19214 21.8439 3.37912L21.3171 4.37019C21.2295 4.53545 21.2077 4.72774 21.2561 4.90841C21.3045 5.08907 21.4195 5.24471 21.578 5.34404L22.5273 5.9411C22.7071 6.05324 22.8461 6.22006 22.924 6.41706C23.002 6.61406 23.0147 6.83085 22.9603 7.03561C22.9059 7.24036 22.7873 7.42229 22.6219 7.55467C22.4565 7.68705 22.253 7.7629 22.0413 7.7711L20.9235 7.80929C20.7371 7.816 20.5602 7.89324 20.4286 8.02539C20.297 8.15754 20.2205 8.33473 20.2145 8.52115L20.179 9.64113C20.1727 9.85281 20.0984 10.0568 19.967 10.2229C19.8357 10.389 19.6542 10.5083 19.4497 10.5631C19.2451 10.618 19.0284 10.6053 18.8315 10.5272C18.6347 10.449 18.4683 10.3095 18.3571 10.1293L17.762 9.17525C17.6638 9.0168 17.509 8.90157 17.3291 8.85289C17.1492 8.80422 16.9575 8.82572 16.7928 8.91305L15.8049 9.43908C15.6175 9.53784 15.4033 9.57389 15.1939 9.54194C14.9844 9.51 14.7908 9.41175 14.6413 9.26161C14.4918 9.11148 14.3944 8.91737 14.3634 8.7078C14.3324 8.49823 14.3694 8.28424 14.469 8.09725L14.9933 7.10534C15.0809 6.94007 15.1027 6.74778 15.0543 6.56712C15.0059 6.38645 14.8909 6.23081 14.7324 6.13148L13.7831 5.53748C13.6034 5.42533 13.4643 5.25851 13.3864 5.06151C13.3085 4.86452 13.2958 4.64772 13.3501 4.44296C13.4045 4.23821 13.5231 4.05628 13.6885 3.92391C13.8539 3.79153 14.0574 3.71567 14.2691 3.70748L15.3877 3.66909C15.5739 3.66238 15.7507 3.58515 15.8822 3.45302C16.0137 3.32089 16.0901 3.14374 16.0959 2.95743L16.1347 1.83506Z"/></svg>
                </a>
        
                <!-- Custmization offcanvas -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCustomize" aria-labelledby="offcanvasCustomizeTitle">
                    <div class="offcanvas-body pt-7 pb-5 position-relative">
                
                        <button type="button" class="btn-close position-absolute top-0 end-0 mt-5 me-5" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                
                        <div class="text-center">
                            <img src="https://d33wubrfki0l68.cloudfront.net/0e108d71de2aec22aae71d891ecabd0ec28dc2bb/8484b/assets/images/illustrations/customization-illustration.svg" alt="..." class="img-fluid w-50 mb-5" width="170" height="170">
                            <h3 class="mb-2" id="offcanvasCustomizeTitle">Make Dashly Your Own</h3>
                            <p class="mb-0">Set preferences that will be cookied for your live preview demonstration</p>
                        </div>
                        
                        <hr>
                
                        <h4 class="mb-0">Color Scheme</h4>
                        <p class="text-secondary fs-5 mb-4">Overall light or dark presentation.</p>
                        <div class="btn-group w-100 mb-7" role="group" aria-label="Light/dark switcher">
                            <input type="radio" class="btn-check" name="theme" id="lightMode" value="light" data-theme-control="theme">
                            <label class="btn btn-outline-primary px-3 w-100 d-flex align-items-center justify-content-center" for="lightMode">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><g><path d="M12,4.64A7.36,7.36,0,1,0,19.36,12,7.37,7.37,0,0,0,12,4.64Zm0,12.72A5.36,5.36,0,1,1,17.36,12,5.37,5.37,0,0,1,12,17.36Z" style="fill: currentColor"/><path d="M12,3.47a1,1,0,0,0,1-1V1a1,1,0,0,0-2,0V2.47A1,1,0,0,0,12,3.47Z" style="fill: currentColor"/><path d="M4.55,6a1,1,0,0,0,.71.29A1,1,0,0,0,6,6,1,1,0,0,0,6,4.55l-1-1A1,1,0,0,0,3.51,4.93Z" style="fill: currentColor"/><path d="M2.47,11H1a1,1,0,0,0,0,2H2.47a1,1,0,1,0,0-2Z" style="fill: currentColor"/><path d="M4.55,18l-1,1a1,1,0,0,0,0,1.42,1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29l1-1A1,1,0,0,0,4.55,18Z" style="fill: currentColor"/><path d="M12,20.53a1,1,0,0,0-1,1V23a1,1,0,0,0,2,0V21.53A1,1,0,0,0,12,20.53Z" style="fill: currentColor"/><path d="M19.45,18A1,1,0,0,0,18,19.45l1,1a1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.42Z" style="fill: currentColor"/><path d="M23,11H21.53a1,1,0,0,0,0,2H23a1,1,0,0,0,0-2Z" style="fill: currentColor"/><path d="M18.74,6.26A1,1,0,0,0,19.45,6l1-1a1,1,0,1,0-1.42-1.42l-1,1A1,1,0,0,0,18,6,1,1,0,0,0,18.74,6.26Z" style="fill: currentColor"/></g></svg>
                                Light
                            </label>
                
                            <input type="radio" class="btn-check" name="theme" id="darkMode" value="dark" data-theme-control="theme">
                            <label class="btn btn-outline-primary px-3 w-100 d-flex align-items-center justify-content-center" for="darkMode">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><path d="M19.57,23.34a1,1,0,0,0,0-1.9,9.94,9.94,0,0,1,0-18.88,1,1,0,0,0,.68-.94,1,1,0,0,0-.68-.95A11.58,11.58,0,0,0,8.88,2.18,12.33,12.33,0,0,0,3.75,12a12.31,12.31,0,0,0,5.11,9.79A11.49,11.49,0,0,0,15.61,24,12.55,12.55,0,0,0,19.57,23.34ZM10,20.17A10.29,10.29,0,0,1,5.75,12a10.32,10.32,0,0,1,4.3-8.19A9.34,9.34,0,0,1,15.59,2a.17.17,0,0,1,.17.13.18.18,0,0,1-.07.2,11.94,11.94,0,0,0-.18,19.21.25.25,0,0,1-.16.45A9.5,9.5,0,0,1,10,20.17Z" style="fill: currentColor"/></svg>
                                Dark
                            </label>
                
                            <input type="radio" class="btn-check" name="theme" id="autoMode" value="auto" data-theme-control="theme">
                            <label class="btn btn-outline-primary px-3 w-100 d-flex align-items-center justify-content-center" for="autoMode">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><path d="M24,12a1,1,0,0,0-1-1H19.09a.51.51,0,0,1-.49-.4,6.83,6.83,0,0,0-.94-2.28.5.5,0,0,1,.06-.63l2.77-2.76a1,1,0,1,0-1.42-1.42L16.31,6.28a.5.5,0,0,1-.63.06A6.83,6.83,0,0,0,13.4,5.4a.5.5,0,0,1-.4-.49V1a1,1,0,0,0-2,0V4.91a.51.51,0,0,1-.4.49,6.83,6.83,0,0,0-2.28.94.5.5,0,0,1-.63-.06L4.93,3.51A1,1,0,0,0,3.51,4.93L6.28,7.69a.5.5,0,0,1,.06.63A6.83,6.83,0,0,0,5.4,10.6a.5.5,0,0,1-.49.4H1a1,1,0,0,0,0,2H4.91a.51.51,0,0,1,.49.4,6.83,6.83,0,0,0,.94,2.28.5.5,0,0,1-.06.63L3.51,19.07a1,1,0,1,0,1.42,1.42l2.76-2.77a.5.5,0,0,1,.63-.06,6.83,6.83,0,0,0,2.28.94.5.5,0,0,1,.4.49V23a1,1,0,0,0,2,0V19.09a.51.51,0,0,1,.4-.49,6.83,6.83,0,0,0,2.28-.94.5.5,0,0,1,.63.06l2.76,2.77a1,1,0,1,0,1.42-1.42l-2.77-2.76a.5.5,0,0,1-.06-.63,6.83,6.83,0,0,0,.94-2.28.5.5,0,0,1,.49-.4H23A1,1,0,0,0,24,12Zm-8.74,2.5A5.76,5.76,0,0,1,9.5,8.74a5.66,5.66,0,0,1,.16-1.31A.49.49,0,0,1,10,7.07a5.36,5.36,0,0,1,1.8-.31,5.47,5.47,0,0,1,5.46,5.46,5.36,5.36,0,0,1-.31,1.8.49.49,0,0,1-.35.32A5.53,5.53,0,0,1,15.26,14.5Z" style="fill: currentColor"/></svg>
                                Auto
                            </label>
                        </div>
                
                        <h4 class="mb-0">Navigation Color</h4>
                        <p class="text-secondary fs-5 mb-4">Usually dictated by the color scheme, but can be overriden.</p>
                        <div class="btn-group w-100 mb-7" role="group" aria-label="Navigation color switcher">
                            <input type="radio" class="btn-check" name="navigationColor" id="defaultColor" value="default" data-theme-control="navigationColor">
                            <label class="btn btn-outline-primary w-50" for="defaultColor">
                                Default
                            </label>
                
                            <input type="radio" class="btn-check" name="navigationColor" id="invertedColor" value="inverted" data-theme-control="navigationColor">
                            <label class="btn btn-outline-primary w-50" for="invertedColor">
                                Inverted
                            </label>
                        </div>
                
                        <h4 class="mb-0">Sidebar behaviour</h4>
                        <p class="text-secondary fs-5 mb-4">Standard navigation sizing or minified icons with dropdowns.</p>
                        <div class="btn-group w-100 mb-7" role="group" aria-label="Sidebar layout switcher">
                            <input type="radio" class="btn-check" name="sidebarSizing" id="fixed" value="fixed" data-theme-control="sidebarBehaviour">
                            <label class="btn btn-outline-primary px-3 w-100" for="fixed">
                                Fixed
                            </label>
                
                            <input type="radio" class="btn-check" name="sidebarSizing" id="condensed" value="condensed" data-theme-control="sidebarBehaviour">
                            <label class="btn btn-outline-primary px-3 w-100" for="condensed">
                                Condensed
                            </label>
                
                            <input type="radio" class="btn-check" name="sidebarSizing" id="scrollable" value="scrollable" data-theme-control="sidebarBehaviour">
                            <label class="btn btn-outline-primary px-3 w-100" for="scrollable">
                                Scrollable
                            </label>
                        </div>
                
                        
                
                        <div class="row gx-4 mt-auto">
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-lg mb-3">
                                <button class="btn btn-light w-100 d-flex align-items-center justify-content-center" id="resetThemeConfig">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="16" width="16"><path d="M12.57,1.26A10.81,10.81,0,0,0,2.82,8.4a.25.25,0,0,1-.27.16L.86,8.31a.52.52,0,0,0-.49.21.51.51,0,0,0,0,.53L3,13.75a.51.51,0,0,0,.43.25.52.52,0,0,0,.36-.14l3.77-3.75a.5.5,0,0,0-.28-.85L5.59,9a.26.26,0,0,1-.18-.13.24.24,0,0,1,0-.22,8.26,8.26,0,1,1,7.87,11.59,1.25,1.25,0,1,0,.09,2.5,10.75,10.75,0,0,0-.79-21.49Z" style="fill: currentColor"/></svg>                      
                                    Reset
                                </button>
                            </div>
                            <div class="col-lg mb-3">
                                <button class="btn btn-dark w-100 d-flex align-items-center justify-content-center" id="previewThemeConfig">
                                    Preview
                                </button>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
                <!-- Separator -->
                <div class="vr bg-gray-700 mx-2 mx-lg-3"></div>
        
                <!-- Dropdown -->
                <div class="dropdown">
                    <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
                        <?php if(empty($staff->profil)) {
                            $a = strtoupper(substr($staff->firstname, 0, 1));
                            $b = strtoupper(substr($staff->lastname, 0, 1)); ?>
                            <div class="avatar avatar-circle avatar-xs me-2">
                                <span class="avatar-title text-bg-danger-soft" style="color: purple; width:40px; height:40px;"><?= $a.$b ?></span>
                            </div>
                        <?php } else { ?>
                            <div class="avatar avatar-circle avatar-sm avatar-online">
                                <img src="/img/staffs/<?= $staff->profil ?>" alt="Profile picture" class="avatar-img" width="40" height="40">
                            </div>
                        <?php } ?>
                    </a>
                            
                    <div class="dropdown-menu">
                        <div class="dropdown-item-text">
                            <div class="d-flex align-items-center">
                                <?php if(empty($staff->profil)) {
                                    $a = strtoupper(substr($staff->firstname, 0, 1));
                                    $b = strtoupper(substr($staff->lastname, 0, 1)); ?>
                                    <div class="avatar avatar-circle avatar-xs me-2">
                                        <span class="avatar-title text-bg-danger-soft" style="color: purple; width:40px; height:40px;"><?= $a.$b ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="avatar avatar-circle avatar-sm avatar-online">
                                        <img src="/img/staffs/<?= $staff->profil ?>" alt="Profile picture" class="avatar-img" width="40" height="40">
                                    </div>
                                <?php } ?>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-0"><?= $staff->firstname. ' ' . $staff->lastname ?></h4>
                                    <p class="card-text"><?= $staff->email?></p>
                                </div>
                            </div>
                        </div>
        
                        <hr class="dropdown-divider">
        
                        <!-- Dropdown -->
                        <div class="dropdown dropend">
                            <a class="dropdown-item dropdown-toggle" href="javascript: void(0);" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-16,10">
                                Settings
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="statusDropdown">
                                <a class="dropdown-item" href="/staffs/edit_password">
                                    Edit password
                                </a>
                                <a class="dropdown-item" href="javascript: void(0);">
                                    <span class="legend-circle bg-danger me-2"></span>Busy
                                </a>
                                <a class="dropdown-item" href="javascript: void(0);">
                                    <span class="legend-circle bg-warning me-2"></span>Away
                                </a>
                                <a class="dropdown-item" href="javascript: void(0);">
                                    <span class="legend-circle bg-gray-500 me-2"></span>Appear offline
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="javascript: void(0);">
                                    Reset status
                                </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->
        
                        <a class="dropdown-item" href="/dashboards/my_profil">Profile & account</a>
        
                        <hr class="dropdown-divider">
        
                        <a class="dropdown-item" href="/auths/logout">Sign out</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid">
            <?= $contennu; ?>
        </div>
        </main>
        

            <!-- JAVASCRIPT-->
            <!-- Theme JS -->
         <script src="/js/theme.bundle.js"></script>
         <script src="/js/jquery.js"></script>
         <script src="/js/script.js"></script>
         <script type="text/javascript">
        
            document.getElementById("profil").onchange = function(){
                document.getElementById("image").src = URL.createObjectURL(profil.files[0]); // Preview new image

                document.getElementById("cancel").style.display = "block";
                document.getElementById("confirm").style.display = "block";

                document.getElementById("upload").style.display = "none";
            }
      </script>
    </body>
<!-- Mirrored from dashly-theme.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2023 12:35:15 GMT -->
</html>
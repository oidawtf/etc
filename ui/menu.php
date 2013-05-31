

<div class="nav-bar">
    <div class="nav-bar-inner padding10">
        <span class="pull-menu"></span>
            <ul class="menu" style="margin-top:5px">
                
            <?php
            
            if (controller::isLoggedIn())
                $menu = controller::getMenuAuthorized();
            else
                $menu = controller::getMenu();
            
            function createTextmenu($menu) {
                echo "<li>";
                echo    "<form class='input-control text' style='width:150px' action='' method='GET'>";
                echo        "<input name='content' type='hidden' value='".$menu->getUrl()."'>";
                echo        "<input name='".$menu->getName()."' style='height:28px;min-height:28px;' type='text' placeholder='".$menu->getPlaceholder()."'>";
                echo        "<button class='".$menu->getIcon()." textmenuIcon' onclick='parentNode.submit();' tabindex='-1' type='button'></button>";
                echo    "</form>";
                echo "</li>";
            }
            
            function createMenuContent($menu) {
                if ($menu->getImage() == NULL) {
                    echo "<i class='".$menu->getIcon()."' style='margin-right:5px'></i>";
                    echo $menu->getTitle();
                }
                else {
                    echo "
                        <span>
                            <img class='place-left' style='height: 30px' src='".$menu->getImage()."'>".$menu->getTitle()."
                        </span>
                        ";
                }
            }
            
            function createMenu($menu) {
                if ($menu->getAction() == NULL && $menu->getMethod() == NULL) {
                    echo "<li><a href='".$menu->getUrl()."'>",createMenuContent($menu),"</a></li>";
                }
                else {
                    echo "
                        <li>
                            <form action='".$menu->getAction()."' method='".$menu->getMethod()."'>
                                <a href='javascript:;' onclick='parentNode.submit();'>",createMenuContent($menu),"</a>
                                <input type='hidden' name='content' value='".$menu->getUrl()."' />
                            </form>
                        </li>
                        ";
                }
            }

            foreach ($menu as $item) {
                if ($item == menu::getSeparator()) {
                    echo "<li class=\"divider\"></li>";
                    continue;
                }
                
                if ($item instanceof textmenu) {
                    createTextmenu($item);
                    continue;
                }

                if ($item instanceof menu) {
                    if ($item->getSubmenu() == NULL) {
                        createMenu ($item);
                    }
                    else {
                        echo "
                            <li data-role=\"dropdown\">
                                <a href=\"#\">".$item->getTitle()."</a>
                                    <ul class=\"dropdown-menu\">
                            ";
                        foreach ($item->getSubmenu() as $subItem)
                            createMenu ($subItem);
                        echo "
                            </ul>
                                </li>
                            ";
                    }
                }
            }

            ?>
                
            </ul>
   </div>
</div>
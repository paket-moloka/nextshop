<div class="vertical-menu mb-all-30">
    <span class="categorie-title"><?= $title?></span>
    <nav>
        <ul class="vertical-menu-list">
            <?php
            foreach ($cats as $cat) {
                $parents = $cat->getParents();
                if (count($parents) > 0) {
                    echo "<li><a href='/products/".$cat->id."'>".$cat->name."<i class='fa fa-angle-right' aria-hidden='true'></i></a>";
                    echo "<ul class='ht-dropdown megamenu megamenu-two'>";
                    echo "<li class='single-megamenu'>
                                                        <ul>";
                    foreach ($parents as $subCat) {
                        echo "<li><a href='/products/".$subCat->id."'>".$subCat->name."</a></li>";
                    }
                    echo "       </ul>
                                                  </li>";
                    echo "</ul>";
                    echo "</li>";
                } else {
                    echo "<li><a href='/products/".$cat->id."'>".$cat->name."</a></li>";
                }
            }
            ?>
        </ul>
    </nav>
</div>

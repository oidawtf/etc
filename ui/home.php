<div class="page-header">
    <div class="page-header-content">
        <h1>
            E.T.C. - Home
            <small>Events. Theater. Cinema.</small>
        </h1>
    </div>
</div>
<div class="page-region">
    <div class="page-region-content">
        <div class="grid"">
            <div class="span15">
                <div class="carousel span15" data-param-period="5000" data-param-duration="1500" data-param-direction="left" data-param-effect="slide" data-role="carousel" style="height: 500px;">
                    <div class="slides">
                        
                         <?php
                         
                         foreach (controller::getNews() as $newsItem) {
                             printf(
                                     "
                                     <div class=\"slide\">
                                         <a href=\"%s\">
                                             <h2 style=\"padding:10px\">%s</h2>
                                             <img style=\"float:left;margin-right:10px\" alt=\"%s\" src=\"%s\" />
                                             %s
                                         </a>
                                     </div>
                                     ",
                                     $newsItem->getUrl(),
                                     $newsItem->getTitle(),
                                     $newsItem->getTitle(),
                                     $newsItem->getImage(),
                                     $newsItem->getDescription()
                                     );
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

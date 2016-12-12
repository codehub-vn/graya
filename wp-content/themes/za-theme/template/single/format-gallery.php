<?php if(get_the_content()){ ?>
<div class="entry container"><?php the_content(); wp_link_pages(); ?></div><!--End entry-->
<?php 
} 
//** get property
        $property = ux_get_post_meta(get_the_ID(), 'theme_meta_enable_portfolio_property');
        
        if($property){
            
            if(isset($property['title'])){
                $property_title = $property['title'];
                $switch = true;
                
                if(count($property_title) == 1){
                    if(empty($property['title'][0]) && empty($property['content'][0])){
                        $switch = false;
                    }
                } 
                
                if($switch){ ?>
        
                    <section class="gallery-property">
                        <ul class="gallery-info-property">
                            <?php foreach($property_title as $num => $title){
                                $content = $property['content'][$num]; ?>
                                <li class="gallery-info-property-li">
                                    <div class="gallery-info-property-item gallery-info-property-tit"><?php echo balanceTags($title,false); ?></div>
                                    <div class="gallery-info-property-item gallery-info-property-con"><?php echo balanceTags($content,false); ?></div>
                                </li>
                            <?php } ?>
                        </ul>    
                    </section>
                
                <?php
                }
            }
        } ?>

									
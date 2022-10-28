    <div class="card shadow-sm my-3 post ">
        <?php global $url;global $p;?>

        <div class="card-body">
            <a href="detail.php?id=<?php echo $p['id']; ?>" class="text-primary text-decoration-none">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <h4 class="d-inline-block"><?php echo $p['title']; ?></h4>
                    </div>
                    <div class="">
                        <?php 
                            if($p['ordering']==1){
                                ?>
                        <i class="feather-paperclip text-primary ml-5">Pinned Post</i>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </a>
            <div class="">
                <i class="feather-user text-primary"></i>
                <?php
                if(isset(user($p['user_id'])['name']))
                    echo user($p['user_id'])['name'];
                else
                    echo "Unknown"
                ?>
                <i class="feather-layers text-success"></i><?php echo category($p['category_id'])['title']; ?>
                <i class="feather-calendar text-danger"></i><?php echo date('j M Y',strtotime($p['created_at'])); ?>
            </div>
            <p class=" my-3 <?php echo $p['ordering']==1 ? 'text-dark':'' ?>">
                <?php echo short(strip_tags(html_entity_decode($p['description'])),200); ?></p>
        </div>
    </div>
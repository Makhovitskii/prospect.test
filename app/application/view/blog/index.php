<div id="header-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>
                        <?php echo lang::word('blog_content_1');?>
                        
                    </h1>
                    <p>
                        <?php echo lang::word('blog_content_2');?>
                        
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="blogMain">

    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div id="blogItems">
                    <h2>Ən çox oxunalar</h2>
                    <div class="bottom-line"></div>
                    
                    <div class="col-md-4">
                        <div class="img-block">
                            <a href="#">
                                <img src="public/uploads/blog/erp-pune-mini.jpg">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati magni voluptatibus.</p>
                            <a href="#" class="news-button">Daha ətraflı...</a>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="img-block">
                            <a href="#">
                                <img src="public/uploads/blog/erp-web.jpg">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati magni voluptatibus.</p>
                            <a href="#" class="news-button">Daha ətraflı...</a>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="img-block">
                            <a href="#">
                                <img src="public/uploads/blog/system-erp.jpg">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati magni voluptatibus.</p>
                            <a href="#" class="news-button">Daha ətraflı...</a>
                        </div>

                        
                    </div>    

                   

                </div>
                <!-- <div id="pagination"> -->
                    <!-- <ul> -->
                        <!-- <li> -->
                            <!-- <a href="">1</a> -->
                        <!-- </li> -->
                        <!-- <li> -->
                            <!-- <a href="">2</a> -->
                        <!-- </li> -->
                        <!-- <li> -->
                            <!-- <a href="">3</a> -->
                        <!-- </li> -->
                    <!-- </ul> -->
                <!-- </div> -->
            </div>
        </div>
    </div>


     <div class="container-fluid">
        <div class="row">
            <div class="bottom-line-2"></div>
        </div>
    </div> 

    <div class="container">

        <?php
            $i=1;
            foreach ($blogPosts as $post)
            {
                if($i%2==0)
                {
                    echo '<div class="row">
                           <div class="col-md-4">
                               <div class="img-block">
                                   <img src="'.URL.'public/uploads/blog/'.$post->image.'" alt="">
                               </div>
                           </div>
                           <div class="col-md-8">
                               <div class="news-content">
                                   <h1>
                                       '.htmlspecialchars($post->header).'
                                   </h1>
                                   
                                   <p>
                                       '.($post->description_mini).'
                                   </p>
                                   <a class="news-button" href="'.URL.'blog/post/'.intval($post->id).'"  onclick="guestLogs("blog", "viewPost'.intval($post->id).'")">ardını oxu...</a>
                               </div>
                           </div>
                        </div>
                        <div class="bottom-line-2"></div>';
                }
                else
                {
                    echo '<div class="row">
                           <div class="col-md-8">
                               <div class="news-content left-position">
                                   <h1>
                                       '.htmlspecialchars($post->header).'
                                   </h1>
                                   
                                   <p>
                                       '.($post->description_mini).'
                                   </p>
                                   <a class="news-button left-position" href="'.URL.'blog/post/'.intval($post->id).'"  onclick="guestLogs("blog", "viewPost'.intval($post->id).'")">ardını oxu...</a>
                               </div>
                           </div>
                           <div class="col-md-4">
                               <div class="img-block">
                                   <img src="'.URL.'public/uploads/blog/'.$post->image.'" alt="">
                               </div>
                           </div>
                        </div>
                        <div class="container-fluid">
        <div class="row">
            <div class="bottom-line-2"></div>
        </div>
    </div>';
                }

                $i++;
                
                
            }
        ?>

        
    </div>
</div>


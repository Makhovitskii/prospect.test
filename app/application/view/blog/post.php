
<div id="blog-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>
                       <?php echo htmlspecialchars($blogPost->header);?>
                    </h1>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="blog-post">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 post">
                <div class="share hidden-xs hidden-sm">
                    <h1>PAYLAŞ:</h1>
                    <div class="share-icons">
                        <div class="css-xlw9kt" data-reactid="156">
                            <div data-reactid="161">
                                <a target="_blank" href="https://www.facebook.com/avocode/" rel="noopener noreferrer" data-reactid="162">
                                    <i class="fa fa-facebook css-9flpw1"></i>
                                </a>
                            </div>
                            <!-- <div data-reactid="165">
                                <a target="_blank" href="https://www.instagram.com/avocode/" rel="noopener noreferrer" data-reactid="166">
                                    <i class="fa fa-instagram css-9flpw1"></i>
                                </a>
                            </div> -->
                            <div data-reactid="177">
                                <a target="_blank" href="https://www.linkedin.com/company/avocode-inc-" rel="noopener noreferrer" data-reactid="178">
                                    <i class="fa fa-linkedin css-9flpw1"></i>
                                </a>
                            </div>

                            <div data-reactid="173">
                                <a target="_blank" href="https://dribbble.com/avocode" rel="noopener noreferrer" data-reactid="174">
                                    <i class="fa fa-google-plus css-9flpw1"></i>
                                </a>
                            </div>
                            <!-- <div data-reactid="169">
                                <a target="_blank" href="https://www.youtube.com/channel/UCaNsjhUdh3BxFL6tzyuhc9g" rel="noopener noreferrer" data-reactid="170">
                                    <i class="fa fa-youtube css-9flpw1"></i>
                                </a>
                            </div> -->

                        </div>
                    </div>
                </div>
                <div class="col-md-12 post-content">
                    <div class="post-img">
                        <img src="<?php echo URL.'uploads/blog/'.$blogPost->image;?>">
                    </div>
                    <p>
                        <?php echo htmlspecialchars($blogPost->description_mini);?>
                    </p>
                    <div>
                        <?php echo ($blogPost->decsription_full);?>
                    </div>
                </div>

            </div>


        </div>
        <div class="bottom-line-2"></div>
    </div>

</div>

 

    <div class="container">
        <div class="row">
        <?php

        foreach ($similar as $sInf)
        {
            echo '<div class="col-md-4">
                <div class="blog-popular">
                    <a href="'.URL.'blog/post/'.$sInf->id.'"><img src="'.URL.'uploads/blog/'.$sInf->image.'"></a>
                    <a href="'.URL.'blog/post/'.$sInf->id.'"><p>'.$sInf->header.'</p></a>
                </div>
            </div>';
        }

        ?>
            
        </div>


        <div class="bottom-line-2"></div>
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="subscribe">
                    <input type="text" name="subscribe" placeholder="E-mail">
                </div>
            </div>
            <div class="col-md-2">
                <div class="but">
                    <input type="button" name="btn" value="İzlə">
                </div>
            </div>
        </div>
        
    </div>

    
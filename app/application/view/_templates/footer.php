<footer class="css-yv843c " role="contentinfo">
  <div class="container">
      <div class="css-112ku7m">
          <div class="css-hywjf7">
              <div class="css-1380hor">
                  <h2 class="css-1a8bunj"><?php echo lang::word('company');?></h2>
                  <ul class="css-1igb4nt">
                      <li>
                          <a class="css-r88mj5" href="<?php echo URL;?>features" onclick="guestLogs('footer', 'features');"><?php echo lang::word('features');?></a>
                      </li>
                      <li>
                          <a class="css-r88mj5" href="<?php echo URL;?>pricing" onclick="guestLogs('footer', 'pricing');"><?php echo lang::word('pricing');?></a>
                      </li>
                      <li>
                          <a class="css-r88mj5" href="<?php echo URL;?>blog" onclick="guestLogs('footer', 'blog');"><?php echo lang::word('blog');?></a>
                      </li>
                      <li>
                          <a class="css-r88mj5" href="<?php echo URL;?>updates" onclick="guestLogs('footer', 'updates');"><?php echo lang::word('updates');?></a>
                      </li>
                      </li>
                  </ul>
              </div>
              <div class="css-1380hor" style="display: none">
                  <h2 class="css-1a8bunj"><?php echo lang::word('support');?></h2>
                  <ul class="css-1igb4nt">
                      <li>
                          <a class="css-r88mj5" href="jacascript:;" onclick="guestLogs('footer', 'server');"><?php echo lang::word('server');?></a>
                      </li>
                      <li>
                          <a class="css-r88mj5" href="jacascript:;" onclick="guestLogs('footer', 'help-center');"><?php echo lang::word('help_center');?></a>
                      </li>
                      <li>
                          <a class="css-r88mj5" href="jacascript:;" onclick="guestLogs('footer', 'privacy-policy');"><?php echo lang::word('privacy_policy');?></a>
                      </li>
                      <li>
                          <a class="css-r88mj5" href="jacascript:;" onclick="guestLogs('footer', 'usage');"><?php echo lang::word('terms_of_use');?></a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="css-11a6jix">
              <div class="css-xlw9kt">
                  <div>
                      <a target="_blank" href="https://www.facebook.com/prospect.erp/" rel="noopener noreferrer" onclick="guestLogs('footer', 'facebook');">
                          <i class="fa fa-facebook css-9flpw1"></i>
                      </a>
                  </div>
                  <div>
                      <a target="_blank" href="https://www.instagram.com/prospect_erp" rel="noopener noreferrer" onclick="guestLogs('footer', 'instagram');">
                          <i class="fa fa-instagram css-9flpw1"></i>
                      </a>
                  </div>
                  <div>
                      <a target="_blank" href="https://www.linkedin.com/company/11322932" rel="noopener noreferrer" onclick="guestLogs('footer', 'linkedin');">
                          <i class="fa fa-linkedin css-9flpw1"></i>
                      </a>
                  </div>

                  <div>
                      <a target="_blank" href="https://plus.google.com/103370638536250206626" rel="noopener noreferrer" onclick="guestLogs('footer', 'plus-google');">
                          <i class="fa fa-google-plus css-9flpw1"></i>
                      </a>
                  </div>
                  <div>
                      <a target="_blank" href="https://www.youtube.com/watch?v=ClZGA0BQPBE&list=PL_SHI0IhhsQ3LnXpUS5QYHtWwLVqm8ezC" rel="noopener noreferrer" onclick="guestLogs('footer', 'youtube');">
                          <i class="fa fa-youtube css-9flpw1"></i>
                      </a>
                  </div>

              </div>
              <div>
                  <div class="css-1g4kqmg">
                      <a target="_blank" href="mailto:erp@prospect.az" rel="noopener noreferrer" class="css-1hfqjz9" onclick="guestLogs('footer', 'mail');">
                          <?php echo lang::word('footer_content_1');?>

                      </a>
                  </div>
                  <div class="css-1g4kqmg">
                      <a target="_blank" href="https://www.prospect.az/" rel="noopener noreferrer" class="css-1hfqjz9" onclick="guestLogs('footer', 'prospect.az');">
                          <?php echo lang::word('footer_content_2');?>: www.prospect.az

                      </a>
                  </div>
                  <div class="css-1g4kqmg">
                      <a target="_blank" href="javascript:;" rel="noopener noreferrer" class="css-1hfqjz9">
                          <?php echo lang::word('footer_content_3');?>: +994 12 310 21 21

                      </a>
                  </div>
                  <div class="css-1g4kqmg">
                      <a target="_blank" href="javascript:;" rel="noopener noreferrer" class="css-1hfqjz9">
                          <?php echo lang::word('footer_content_4');?>

                      </a>
                  </div>
              </div>
          </div>
      </div>
      <div class="css-pigj01">
          <p class="css-1tgf83s">
              <?php echo lang::word('footer_content_5');?><br> &copy; 2003 - 2018 PRONET MMC

          </p>
          <a rel="nofollow" href="http://prospect.az" onclick="guestLogs('footer', 'prospect.az-logo');">
              <img src="<?php echo URL;?>images/prospect-footer-logo.png" width="115" />
          </a>
      </div>
  </div>
</footer>
</div>
</div>
</div>
<div id="__next-error"></div>
</div>

    <?php

        require_once ( APP. 'addons/proagent/chat.php');

    ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>js/main.js"></script>

<script type="text/javascript">

    var url = "<?php echo URL; ?>";

    function guestLogs(module, dest)
    {
        if(module!="" && dest!="")
        {
            $.post(url + "/home/guestLogs",{'module':module,'dest':dest});
        }
    }
</script>


</html>

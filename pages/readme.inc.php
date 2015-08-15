<?php

// AddOn-PIWIK

   //////////////////////////////////////////////////////////////////////////////////
   // CONFIG
   //////////////////////////////////////////////////////////////////////////////////

   // GET PARAMS
   ////////////////////////////////////////////////////////////////////////////////
   $page 	   = rex_request('page', 'string');
   $subpage 	= rex_request('subpage', 'string');
   #$func    	= rex_request('func', 'string');
   #$oid     	= rex_request('oid', 'int');

   //////////////////////////////////////////////////////////////////////////////////
   // SUBPAGES
   //////////////////////////////////////////////////////////////////////////////////

?>

   <div class="rex-addon-output">
      <h2 class="rex-hl2"><?php echo $I18N->msg($page.'_subpage_readme'); ?></h2>

      <div class="rex-addon-content">
         <p class="rex-code">
         <code><span style="color: #000000">
         <?php
            echo $I18N->msg($page.'_subpage_readme_txt_01') . "<br />";
         ?>
         </span></code>
         </p>
      </div>
   </div>
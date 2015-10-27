<?php

/**
 * gs_bootstrap
 * @author gilbert.seilheimer[at]contic[dot]de Gilbert Seilheimer
 * @author <a href="http://www.contic.de">www.contic.de</a>
 */

// AddOn-BOOTSTRAP

   //////////////////////////////////////////////////////////////////////////////////
   // CONFIG
   //////////////////////////////////////////////////////////////////////////////////

   // VARs
   $mypage = "gs_bootstrap";

   // MSG
   $msg = '';

   //////////////////////////////////////////////////////////////////////////////////
   // CHECKS
   //////////////////////////////////////////////////////////////////////////////////

   if ($REX['VERSION'] != '4' || $REX['SUBVERSION'] < '6') {
      $msg = $I18N->msg('install_redaxo_version_problem', '4.6');

   } elseif (version_compare(PHP_VERSION, '5.5.0', '<')) {
      $msg = $I18N->msg('install_checkphpversion', PHP_VERSION);

   }


   //////////////////////////////////////////////////////////////////////////////////
   // INSTALL
   //////////////////////////////////////////////////////////////////////////////////

   if ($msg != '') {
      $REX['ADDON']['installmsg'][$mypage] = $msg;

   } else {

      //////////////////////////////////////////////////////////////////////////////////
      // UPDATE/INSERT (DB)
      //////////////////////////////////////////////////////////////////////////////////

      $sql_table = $REX['TABLE_PREFIX']."template";

      $sql = rex_sql::factory();
      $sql->debugsql = 0; //Ausgabe Query
      $sql->setQuery("SELECT * FROM $sql_table WHERE name LIKE '%tpl : addon gs_bootstrap (css)%'");
      $sql->setTable($sql_table);

      if( $sql->getRows() != 0 )
      {
         $sql_id = $sql->getValue('id');
         $sql->setWhere('id = '.$sql_id);
         $sql->setValue("content", "<!-- GS:BOOTSTRAP-CSS-START -->\r\n<!-- css resets -->\r\n<link rel=\"stylesheet\" href=\"/files/addons/gs_bootstrap/css/normalize.css\" media=\"screen, projection\" />\r\n<!-- css default -->\r\n<link rel=\"stylesheet\" href=\"/files/addons/gs_bootstrap/css/bootstrap.min.css\" media=\"screen, projection\" />\r\n<!-- css special settings -->\r\n<link rel=\"stylesheet\" href=\"/files/addons/gs_bootstrap/css/bootstrap-settings.css\" media=\"screen, projection\" />\r\n<!-- css addons -->\r\n<!-- <link rel=\"stylesheet\" href=\"/files/addons/gs_bootstrap/css/XYZ.css\" media=\"screen, projection\" /> -->\r\n<!-- GS:BOOTSTRAP-CSS-ENDE -->\r\n<!-- GS:BOOTSTRAP-JS-START -->\r\n<!-- js addons -->\r\n<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->\r\n<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->\r\n<!--[if lt IE 9]>\r\n<script src=\"/files/addons/gs_bootstrap/js/html5shiv.min.js\"></script>\r\n<script src=\"/files/addons/gs_bootstrap/js/respond.min.js\"></script>\r\n<![endif]-->\r\n<!-- GS:BOOTSTRAP-JS-ENDE -->");

         if ( $sql->update() )
         {
            echo rex_info("Template mit ID : $sql_id erfolgreich aktuallisiert. <br />");
         }
      }
      else
      {
         $sql->setValue("name", "tpl : addon gs_bootstrap (css)");
         $sql->setValue("content", "<!-- GS:BOOTSTRAP-CSS-START -->\r\n<!-- css resets -->\r\n<link rel=\"stylesheet\" href=\"/files/addons/gs_bootstrap/css/normalize.css\" media=\"screen, projection\" />\r\n<!-- css default -->\r\n<link rel=\"stylesheet\" href=\"/files/addons/gs_bootstrap/css/bootstrap.min.css\" media=\"screen, projection\" />\r\n<!-- css special settings -->\r\n<link rel=\"stylesheet\" href=\"/files/addons/gs_bootstrap/css/bootstrap-settings.css\" media=\"screen, projection\" />\r\n<!-- css addons -->\r\n<!-- <link rel=\"stylesheet\" href=\"/files/addons/gs_bootstrap/css/XYZ.css\" media=\"screen, projection\" /> -->\r\n<!-- GS:BOOTSTRAP-CSS-ENDE -->\r\n<!-- GS:BOOTSTRAP-JS-START -->\r\n<!-- js addons -->\r\n<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->\r\n<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->\r\n<!--[if lt IE 9]>\r\n<script src=\"/files/addons/gs_bootstrap/js/html5shiv.min.js\"></script>\r\n<script src=\"/files/addons/gs_bootstrap/js/respond.min.js\"></script>\r\n<![endif]-->\r\n<!-- GS:BOOTSTRAP-JS-ENDE -->");

         if ( $sql->insert() )
         {
            echo rex_info("Template 'tpl : addon gs_bootstrap (css)' erfolgreich eingetragen. <br />");
         }
      }

      //////////////////////////////////////////////////////////////////////////////////
      // UPDATE/INSERT (DB)
      //////////////////////////////////////////////////////////////////////////////////

      $sql->setQuery("SELECT * FROM $sql_table WHERE name LIKE '%tpl : addon gs_bootstrap (js)%'");
      $sql->setTable($sql_table);

      if( $sql->getRows() != 0 )
      {
         $sql_id = $sql->getValue('id');
         $sql->setWhere('id = '.$sql_id);
         $sql->setValue("content", "<!-- GS:JQUERY-JS-START -->\r\n    <script src=\"/redaxo/media/jquery.min.js\"></script>\r\n    <! -- ist manuel auf die aktuelle version von jquery inkl. map zu aktualisieren -->\r\n    <! -- nur zu aktivieren, wenn gs_formstone nicht installiert! -->\r\n    <!-- GS:JQUERY-JS-ENDE -->\r\n\r\n    <!-- GS:BOOTSTRAP-JS-START -->\r\n    <!-- js default -->\r\n    <script src=\"/files/addons/gs_bootstrap/js/bootstrap.min.js\"></script>\r\n    <!-- js addons -->\r\n    <!-- <script src=\"/files/addons/gs_bootstrap/js/jquery.lazyload.min.js\"></script> -->\r\n    <!-- GS:BOOTSTRAP-JS-ENDE -->\r\n\r\n    <!-- GS:BOOTSTRAP-JS-SCRIPT-START -->\r\n    <script>\r\n\r\n        // NAVI\r\n        function bs_navigation() {\r\n\r\n        }//end function\r\n\r\n\r\n        // CAROUSEL\r\n        function bs_carousel(obj) {\r\n\r\n            if(!obj.length) return;\r\n\r\n            obj.carousel({\r\n            });\r\n\r\n        }//end function\r\n\r\n\r\n\r\n        // READY - START\r\n        $(document).ready(function() {\r\n\r\n            // Call BS_NAVIGATION\r\n            //bs_navigation();\r\n\r\n            // Call BS_CAROUSEL\r\n            //bs_carousel($();\r\n\r\n        });\r\n        // Ende ready function()\r\n\r\n    </script>\r\n    <!-- GS:BOOTSTRAP-JS-SCRIPT-ENDE -->");

         if ( $sql->update() )
         {
            echo rex_info("Template mit ID : $sql_id erfolgreich aktuallisiert. <br />");
         }
      }
      else
      {
         $sql->setValue("name", "tpl : addon gs_bootstrap (js)");
         $sql->setValue("content", "<!-- GS:JQUERY-JS-START -->\r\n    <script src=\"/redaxo/media/jquery.min.js\"></script>\r\n    <! -- ist manuel auf die aktuelle version von jquery inkl. map zu aktualisieren -->\r\n    <! -- nur zu aktivieren, wenn gs_formstone nicht installiert! -->\r\n    <!-- GS:JQUERY-JS-ENDE -->\r\n\r\n    <!-- GS:BOOTSTRAP-JS-START -->\r\n    <!-- js default -->\r\n    <script src=\"/files/addons/gs_bootstrap/js/bootstrap.min.js\"></script>\r\n    <!-- js addons -->\r\n    <!-- <script src=\"/files/addons/gs_bootstrap/js/jquery.lazyload.min.js\"></script> -->\r\n    <!-- GS:BOOTSTRAP-JS-ENDE -->\r\n\r\n    <!-- GS:BOOTSTRAP-JS-SCRIPT-START -->\r\n    <script>\r\n\r\n        // NAVI\r\n        function bs_navigation() {\r\n\r\n        }//end function\r\n\r\n\r\n        // CAROUSEL\r\n        function bs_carousel(obj) {\r\n\r\n            if(!obj.length) return;\r\n\r\n            obj.carousel({\r\n            });\r\n\r\n        }//end function\r\n\r\n\r\n\r\n        // READY - START\r\n        $(document).ready(function() {\r\n\r\n            // Call BS_NAVIGATION\r\n            //bs_navigation();\r\n\r\n            // Call BS_CAROUSEL\r\n            //bs_carousel($();\r\n\r\n        });\r\n        // Ende ready function()\r\n\r\n    </script>\r\n    <!-- GS:BOOTSTRAP-JS-SCRIPT-ENDE -->");

         if ( $sql->insert() )
         {
            echo rex_info("Template 'tpl : addon gs_bootstrap (js)' erfolgreich eingetragen. <br />");
         }
      }

      //////////////////////////////////////////////////////////////////////////////////
      // INSTALL FINISHING
      //////////////////////////////////////////////////////////////////////////////////

      if ($sql->hasError()) {
         $msg = 'MySQL-Error: ' . $sql->getErrno() . '<br />';
         $msg .= $sql->getError();

         $REX['ADDON']['install'][$mypage] = FALSE;
         $REX['ADDON']['installmsg'][$mypage] = $msg;

      } else {
         $REX['ADDON']['install'][$mypage] = TRUE;

      }

   }


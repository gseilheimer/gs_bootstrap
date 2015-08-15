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
      $sql->setQuery("SELECT * FROM $sql_table WHERE name LIKE '%tpl : addon gs_bootstrap%'");
      $sql_id = $sql->getValue('id');
      $sql->setTable($sql_table);

      if( $sql->getRows() )
      {
         $sql->setWhere('id = '.$sql_id);
         $sql->setValue("content", "<!-- GS:BOOTSTRAP-START -->\r\n\r\n\r\n<!-- GS:BOOTSTRAP-ENDE -->");

         if ( $sql->update() )
         {
            echo "Template mit ID : $sql_id erfolgreich aktuallisiert.";
         }
      }
      else
      {
         $sql->setValue("name", "tpl : addon gs_bootstrap");
         $sql->setValue("content", "<!-- GS:BOOTSTRAP-START -->\r\n\r\n\r\n<!-- GS:BOOTSTRAP-ENDE -->");

         if ( $sql->insert() )
         {
            echo "Template mit ID : $sql_id erfolgreich eingetragen.";
         }
      }

      if ($sql->hasError()) {
         $msg = 'MySQL-Error: ' . $sql->getErrno() . '<br />';
         $msg .= $sql->getError();

         $REX['ADDON']['install'][$mypage] = FALSE;
         $REX['ADDON']['installmsg'][$mypage] = $msg;
      } else {
         $REX['ADDON']['install'][$mypage] = TRUE;

      }

   }


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


   //////////////////////////////////////////////////////////////////////////////////
   // UPDATE (DB)
   //////////////////////////////////////////////////////////////////////////////////


   $sql_table = $REX['TABLE_PREFIX']."template";

   $sql = rex_sql::factory();
   $sql->debugsql = 1; //Ausgabe Query
   $sql->setQuery("SELECT * FROM $sql_table WHERE name LIKE '%tpl : addon gs_piwik%'");
   $sql_id = $sql->getValue('id');
   $sql->setTable($sql_table);

   if( $sql->getRows() )
   {
      $sql->setWhere('id = '.$sql_id);
      $sql->setValue("content", "<!-- GS:BOOTSTRAP-START -->\r\nADDON gs_piwik deinstalliert\r\n<!-- GS:BOOTSTRAP-ENDE -->");

      if ( $sql->update() )
      {
         echo "Template mit ID : $sql_id erfolgreich aktuallisiert.";
      }
   }


   //////////////////////////////////////////////////////////////////////////////////
   // UNINSTALL
   //////////////////////////////////////////////////////////////////////////////////

   $REX['ADDON']['install'][$mypage] = FALSE;
<?php

/**
 * gs_bootstrap
 * @author gilbert.seilheimer[at]contic[dot]de Gilbert Seilheimer
 * @author <a href="http://www.contic.de">www.contic.de</a>
 *
 * @package redaxo4
 * @version svn:$Id$
 */
/**
 * bootstrap lib
 * @link https://github.com/bootstrap/bootstrap
 * @version 3.x
 */

// AddOn-BOOTSTRAP

    //////////////////////////////////////////////////////////////////////////////////
    // CONFIG
    //////////////////////////////////////////////////////////////////////////////////

    // VARs
    $mypage = "gs_bootstrap";
    $mypage_root = $REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/';

    // VARs - ADDON
    $REX['ADDON']['name'][$mypage] = 'Bootstrap';
    $REX['ADDON']['rxid'][$mypage] = '1241';
    $REX['ADDON']['page'][$mypage] = $mypage;
    $REX['ADDON']['version'][$mypage] = '3.3.5';
    $REX['ADDON']['author'][$mypage] = 'Gilbert Seilheimer';
    $REX['ADDON']['supportpage'][$mypage] = 'forum.redaxo.org';
    $REX['ADDON']['perm'][$mypage] = $mypage . '[]';
    $REX['PERM'][] = $mypage . '[]';


    if ($REX['REDAXO'] && $REX['USER']) {

        //////////////////////////////////////////////////////////////////////////////////
        // INCLUDES
        //////////////////////////////////////////////////////////////////////////////////
        #require_once $addon_root.'.......inc.php';
        require_once($mypage_root .'/classes/class.rex_gs_bootstrap_utils.inc.php');


        //////////////////////////////////////////////////////////////////////////////////
        // FUNCTIONS
        //////////////////////////////////////////////////////////////////////////////////

        /*
        // default settings (user settings are saved in data dir!)
        $REX['ADDON'][$mypage]['settings'] = array(
            'foo' => 'bar',
            'foo2' => true,
        );

        // overwrite default settings with user settings
        rex_mypage_utils::includeSettingsFile();
        */


        //////////////////////////////////////////////////////////////////////////////////
        // SUBPAGES
        //////////////////////////////////////////////////////////////////////////////////

        // Sprachdateien anhaengen
        $I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/lang/');


        // add subpages
        $REX['ADDON'][$mypage]['SUBPAGES'] =
            //        subpage, label, perm, params, attributes
            array(
                array('index', $I18N->msg($mypage . '_subpage_index'), '', '', ''),
                array('settings', $I18N->msg($mypage . '_subpage_settings'), '', '', ''),
                array('readme', $I18N->msg($mypage . '_subpage_readme'), '', '', '')
            );

    } else {

        //////////////////////////////////////////////////////////////////////////////////
        // INCLUDES HEADER
        //////////////////////////////////////////////////////////////////////////////////

        #rex_register_extension('OUTPUT_FILTER', 'rex_gs_bootstrap_utils::includeMyPageHeader');

    }
<?
    include "../libs/libs.inc";
    /*
     * ALL CUSTOM AJAX REFERENCES HAPPENS HERE
     *
     * adding new action:
     * - add new line in switch
     * - add function to be called in switch to the end of file
     * - include all includes and headers in the beginning of your function
     */

    /// choose action
    $action = ((isset($_POST['action'])) ? ( (!empty($_POST['action'])) ? $_POST['action'] : false ) : false);
    switch($action) {
        case 'log':         jx_log();           break;
        case 'login':       legacy_login();     break;
        case 'register':    legacy_register();  break;
        default: respond(false, 'invalid action');
    }

    /// perform action

    // save to log
    function jx_log() {
        header('Content-Type: application/json; charset=utf-8');

        $msg =  (isset($_POST['msg'] )) ? ( (!empty($_POST['msg'] )) ? $_POST['msg']  : false ) : false;
        $type = (isset($_POST['type'])) ? ( (!empty($_POST['type'])) ? $_POST['type'] : 'ajax' ) : 'ajax';

        if($msg) toLog($msg,'ajax');
        else respond('false', 'logged with empty msg');  // all saving already happens in respond(), so no need to double it
    }

    function legacy_login() {
        header('Content-Type: application/json; charset=utf-8');
        // check is user is_logged(); if so set proper cookies
        // if anything on the way fails: remove all cookies|session data
    }

    function legacy_register() {
        header('Content-Type: application/json; charset=utf-8');
        // if user havn't already set account, create one for him and login him to the page right after that
        // TODO: how to set autocomplete for browsers automatically ?
    }

?>

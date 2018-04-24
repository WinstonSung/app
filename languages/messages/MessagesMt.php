<?php
/** Maltese (Malti)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Chrisportelli
 * @author Giangian15
 * @author Kaganer
 * @author Malafaya
 * @author Roderick Mallia
 * @author Urhixidur
 */

$namespaceNames = array(
	NS_MEDIA            => 'Medja',
	NS_SPECIAL          => 'Speċjali',
	NS_TALK             => 'Diskussjoni',
	NS_USER             => 'Utent',
	NS_USER_TALK        => 'Diskussjoni_utent',
	NS_PROJECT_TALK     => 'Diskussjoni_$1',
	NS_FILE             => 'Stampa',
	NS_FILE_TALK        => 'Diskussjoni_stampa',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'Diskussjoni_MediaWiki',
	NS_TEMPLATE         => 'Mudell',
	NS_TEMPLATE_TALK    => 'Diskussjoni_mudell',
	NS_HELP             => 'Għajnuna',
	NS_HELP_TALK        => 'Diskussjoni_għajnuna',
	NS_CATEGORY         => 'Kategorija',
	NS_CATEGORY_TALK    => 'Diskussjoni_kategorija',
);

$namespaceAliases = array(
	'Midja' => NS_MEDIA,
	'Diskuti' => NS_TALK,
	'Diskuti_utent' => NS_USER_TALK,
	'$1_diskuti' => NS_PROJECT_TALK,
	'$1_diskussjoni' => NS_PROJECT_TALK,
	'Diskuti_stampa' => NS_FILE_TALK,
	'MedjaWiki' => NS_MEDIAWIKI,
	'Diskuti_MedjaWiki' => NS_MEDIAWIKI_TALK,
	'Diskuti_template' => NS_TEMPLATE_TALK,
	'Diskuti_għajnuna' => NS_HELP_TALK,
	'Diskuti_kategorija' => NS_CATEGORY_TALK,
);

$specialPageAliases = array(
	'Activeusers'               => array( 'UtentiAttivi' ),
	'Allmessages'               => array( 'MessaġġiKollha' ),
	'Allpages'                  => array( 'PaġniKollha' ),
	'Ancientpages'              => array( 'PaġniQodma', 'PaġniAntiki' ),
	'Badtitle'                  => array( 'TitluĦażin' ),
	'Blankpage'                 => array( 'PaġnaVojta' ),
	'Block'                     => array( 'BlokkaIP' ),
	'Blockme'                   => array( 'Imblukkani' ),
	'Booksources'               => array( 'SorsiKotba' ),
	'BrokenRedirects'           => array( 'RindirizziMiksura' ),
	'Categories'                => array( 'Kategoriji' ),
	'ChangePassword'            => array( 'BiddelPassword' ),
	'ComparePages'              => array( 'IkkomparaPaġni' ),
	'Confirmemail'              => array( 'KonfermaPostaElettronika' ),
	'Contributions'             => array( 'Kontribuzzjonijiet' ),
	'CreateAccount'             => array( 'OħloqKont' ),
	'Deadendpages'              => array( 'PaġniWieqfa' ),
	'DeletedContributions'      => array( 'KontribuzzjonijietImħassra' ),
	'Disambiguations'           => array( 'Diżambigwazzjoni' ),
	'DoubleRedirects'           => array( 'RindirizziDoppji' ),
	'Emailuser'                 => array( 'IbgħatUtent' ),
	'Export'                    => array( 'Esporta' ),
	'Fewestrevisions'           => array( 'L-InqasReviżjonijiet' ),
	'FileDuplicateSearch'       => array( 'FittexFajlDuplikat' ),
	'Filepath'                  => array( 'PostFajl' ),
	'Import'                    => array( 'Importa' ),
	'Invalidateemail'           => array( 'PostaElettronikaInvalida' ),
	'BlockList'                 => array( 'ListaIPImblukkati' ),
	'LinkSearch'                => array( 'FittexĦolqa' ),
	'Listadmins'                => array( 'ListaAmmin' ),
	'Listbots'                  => array( 'ListaBots' ),
	'Listfiles'                 => array( 'ListaStampi', 'ListaFajls' ),
	'Listgrouprights'           => array( 'ListaDrittijietGruppi' ),
	'Listredirects'             => array( 'ListaRindirizzi' ),
	'Listusers'                 => array( 'Utenti', 'ListaUtenti' ),
	'Lockdb'                    => array( 'AgħlaqDB' ),
	'Log'                       => array( 'Reġistru', 'Reġistri' ),
	'Lonelypages'               => array( 'PaġniOrfni' ),
	'Longpages'                 => array( 'PaġniTwal' ),
	'MergeHistory'              => array( 'WaħħadKronoloġija' ),
	'MIMEsearch'                => array( 'FittexMIME' ),
	'Mostcategories'            => array( 'L-AktarKategoriji' ),
	'Mostimages'                => array( 'L-AktarStampiMarbuta' ),
	'Mostlinked'                => array( 'L-AktarPaġniMarbuta' ),
	'Mostlinkedcategories'      => array( 'L-AktarKategorijiMarbuta' ),
	'Mostlinkedtemplates'       => array( 'L-AktarMudelliMarbuta' ),
	'Mostrevisions'             => array( 'L-AktarReviżjonijiet' ),
	'Movepage'                  => array( 'Mexxi', 'MexxiPaġna' ),
	'Mycontributions'           => array( 'KontribuzzjonijietTiegħi' ),
	'Mypage'                    => array( 'PaġnaTiegħi' ),
	'Mytalk'                    => array( 'DiskussjonijietTiegħi' ),
	'Newimages'                 => array( 'StampiĠodda', 'FajlsĠodda' ),
	'Newpages'                  => array( 'PaġniĠodda' ),
	'Popularpages'              => array( 'PaġniPopolari' ),
	'Preferences'               => array( 'Preferenzi' ),
	'Prefixindex'               => array( 'IndiċiPrefiss' ),
	'Protectedpages'            => array( 'PaġniProtetti' ),
	'Protectedtitles'           => array( 'TitliProtetti' ),
	'Randompage'                => array( 'PaġnaKwalunkwe' ),
	'Randomredirect'            => array( 'RiindirizzKwalunkwe' ),
	'Recentchanges'             => array( 'TibdilRiċenti' ),
	'Recentchangeslinked'       => array( 'TibdilRelatat' ),
	'Revisiondelete'            => array( 'ĦassarReviżjoni' ),
	'Search'                    => array( 'Fittex' ),
	'Shortpages'                => array( 'PaġniQosra' ),
	'Specialpages'              => array( 'PaġniSpeċjali' ),
	'Statistics'                => array( 'Statistika' ),
	'Unblock'                   => array( 'Żblokka' ),
	'Uncategorizedcategories'   => array( 'KategorijiMhuxKategorizzati' ),
	'Uncategorizedimages'       => array( 'StampiMhuxKategorizzati' ),
	'Uncategorizedpages'        => array( 'PaġniMhuxKategorizzati' ),
	'Uncategorizedtemplates'    => array( 'MudelliMhuxKategorizzati' ),
	'Undelete'                  => array( 'Irkupra' ),
	'Unlockdb'                  => array( 'IftaħDB' ),
	'Unusedcategories'          => array( 'KategorijiMhuxUżati' ),
	'Unusedimages'              => array( 'StampiMhuxUżati', 'FajlsMhuxUżati' ),
	'Unusedtemplates'           => array( 'MudelliMhuxUżati' ),
	'Unwatchedpages'            => array( 'PaġniMhuxOsservati' ),
	'Upload'                    => array( 'Tella\'' ),
	'Userlogin'                 => array( 'UtentDħul' ),
	'Userlogout'                => array( 'UtentĦruġ' ),
	'Userrights'                => array( 'DrittijietUtent' ),
	'Version'                   => array( 'Verżjoni' ),
	'Wantedcategories'          => array( 'KategorijiRikjesti' ),
	'Wantedfiles'               => array( 'FajlsRikjesti' ),
	'Wantedpages'               => array( 'PaġniRikjesti', 'ĦoloqMiksura' ),
	'Wantedtemplates'           => array( 'MudelliRikjesti' ),
	'Watchlist'                 => array( 'ListaOsservazzjoni' ),
	'Whatlinkshere'             => array( 'XiJwassalHawn' ),
	'Withoutinterwiki'          => array( 'PaġniMingħajrInterwiki', 'BlaInterwiki' ),
);

$magicWords = array(
	'redirect'                => array( '0', '#RINDIRIZZA', '#REDIRECT' ),
	'notoc'                   => array( '0', '__EBDAWERREJ__', '__NOTOC__' ),
	'nogallery'               => array( '0', '__EBDAGALLERIJA__', '__NOGALLERY__' ),
	'forcetoc'                => array( '0', '__SFORZAWERREJ__', '__FORCETOC__' ),
	'toc'                     => array( '0', '__WERREJ__', '__TOC__' ),
	'noeditsection'           => array( '0', '__EBDASEZZJONIMODIFIKA__', '__NOEDITSECTION__' ),
	'currentmonth'            => array( '1', 'XAHARKURRENTI', 'CURRENTMONTH', 'CURRENTMONTH2' ),
	'currentmonthname'        => array( '1', 'ISEMXAHARKURRENTI', 'CURRENTMONTHNAME' ),
	'currentmonthnamegen'     => array( '1', 'ĠENISEMXAHARKURRENTI', 'CURRENTMONTHNAMEGEN' ),
	'currentmonthabbrev'      => array( '1', 'ABBREVXAHARKURRENTI', 'CURRENTMONTHABBREV' ),
	'currentday'              => array( '1', 'ĠURNATAKURRENTI', 'CURRENTDAY' ),
	'currentday2'             => array( '1', 'ĠURNATAKURRENTI2', 'CURRENTDAY2' ),
	'currentdayname'          => array( '1', 'ISEMĠURNATAKURRENTI', 'CURRENTDAYNAME' ),
	'currentyear'             => array( '1', 'SENAKURRENTI', 'CURRENTYEAR' ),
	'currenttime'             => array( '1', 'ĦINKURRENTI', 'CURRENTTIME' ),
	'currenthour'             => array( '1', 'SIEGĦAKURRENTI', 'CURRENTHOUR' ),
	'localmonth'              => array( '1', 'XAHARLOKALI', 'XAHARLOKALI2', 'LOCALMONTH', 'LOCALMONTH2' ),
	'localmonth1'             => array( '1', 'XAHARLOKALI1', 'LOCALMONTH1' ),
	'localmonthname'          => array( '1', 'ISEMXAHARLOKALI', 'LOCALMONTHNAME' ),
	'localmonthnamegen'       => array( '1', 'ĠENISEMXAHARLOKALI', 'LOCALMONTHNAMEGEN' ),
	'localmonthabbrev'        => array( '1', 'ABBREVXAHARLOKALI', 'LOCALMONTHABBREV' ),
	'localday'                => array( '1', 'ĠURNATALOKALI', 'LOCALDAY' ),
	'localday2'               => array( '1', 'ĠURNATALOKALI2', 'LOCALDAY2' ),
	'localdayname'            => array( '1', 'ISEMTAL-ĠURNATALOKALI', 'LOCALDAYNAME' ),
	'localyear'               => array( '1', 'SENALOKALI', 'LOCALYEAR' ),
	'localtime'               => array( '1', 'ĦINLOKALI', 'LOCALTIME' ),
	'localhour'               => array( '1', 'SIEGĦALOKALI', 'LOCALHOUR' ),
	'numberofpages'           => array( '1', 'NUMRUTA\'PAĠNI', 'NUMBEROFPAGES' ),
	'numberofarticles'        => array( '1', 'NUMRUTA\'ARTIKLI', 'NUMBEROFARTICLES' ),
	'numberoffiles'           => array( '1', 'NUMRUTA\'FAJLS', 'NUMBEROFFILES' ),
	'numberofusers'           => array( '1', 'NUMRUTA\'UTENTI', 'NUMBEROFUSERS' ),
	'numberofactiveusers'     => array( '1', 'NUMRUTA\'UTENTIATTIVI', 'NUMBEROFACTIVEUSERS' ),
	'numberofedits'           => array( '1', 'NUMBRUTA\'MODIFIKI', 'NUMBEROFEDITS' ),
	'numberofviews'           => array( '1', 'NUMRUTA\'VISTI', 'NUMBEROFVIEWS' ),
	'pagename'                => array( '1', 'ISEMTAL-PAĠNA', 'PAGENAME' ),
	'pagenamee'               => array( '1', 'ISEMTAL-PAĠNAE', 'PAGENAMEE' ),
	'namespace'               => array( '1', 'SPAZJUTAL-ISEM', 'NAMESPACE' ),
	'namespacee'              => array( '1', 'SPAZJUTAL-ISEME', 'NAMESPACEE' ),
	'talkspace'               => array( '1', 'SPAZJUTA\'DISKUSSJONI', 'TALKSPACE' ),
	'talkspacee'              => array( '1', 'SPAZJUTA\'DISKUSSJONIE', 'TALKSPACEE' ),
	'subjectspace'            => array( '1', 'SPAZJUTAS-SUĠĠETT', 'SPAZJUTAL-ARTIKLU', 'SUBJECTSPACE', 'ARTICLESPACE' ),
	'fullpagename'            => array( '1', 'ISEMSĦIĦTAL-PAĠNA', 'FULLPAGENAME' ),
	'fullpagenamee'           => array( '1', 'ISEMTAL-PAĠNASĦIĦAE', 'FULLPAGENAMEE' ),
	'subpagename'             => array( '1', 'ISEMTAS-SOTTOPAĠNA', 'SUBPAGENAME' ),
	'subpagenamee'            => array( '1', 'ISEMTAS-SUBPAĠNAE', 'SUBPAGENAMEE' ),
	'basepagename'            => array( '1', 'ISEMBAŻIKUTAL-PAĠNA', 'BASEPAGENAME' ),
	'basepagenamee'           => array( '1', 'ISEMTAL-PAĠNATAL-BAŻIE', 'BASEPAGENAMEE' ),
	'talkpagename'            => array( '1', 'ISEMPAĠNATA\'DISKUSSJONI', 'TALKPAGENAME' ),
	'talkpagenamee'           => array( '1', 'ISEMTAL-PAĠNATAD-DISKUSSJONIE', 'TALKPAGENAMEE' ),
	'subjectpagename'         => array( '1', 'ISEMTAS-SUĠĠETTTAL-PAĠNA', 'ISEMTAL-ARTIKLUTAL-PAĠNA', 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ),
	'subjectpagenamee'        => array( '1', 'ISEMTAS-SUĠĠETTTAL-PAĠNAE', 'ISEMTAL-ARTIKLUTAL-PAĠNAE', 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ),
	'msg'                     => array( '0', 'MSĠ:', 'MSG:' ),
	'subst'                   => array( '0', 'BIDDEL:', 'SUBST:' ),
	'msgnw'                   => array( '0', 'MSĠEW:', 'MSGNW:' ),
	'img_thumbnail'           => array( '1', 'daqsminuri', 'minuri', 'thumbnail', 'thumb' ),
	'img_manualthumb'         => array( '1', 'daqsminuri=$1', 'minuri=$1', 'thumbnail=$1', 'thumb=$1' ),
	'img_right'               => array( '1', 'lemin', 'right' ),
	'img_left'                => array( '1', 'xellug', 'left' ),
	'img_none'                => array( '1', 'xejn', 'none' ),
	'img_center'              => array( '1', 'nofs', 'ċentrali', 'ċentru', 'center', 'centre' ),
	'img_framed'              => array( '1', 'tilat', 'b\'tilar', 'tilar', 'framed', 'enframed', 'frame' ),
	'img_frameless'           => array( '1', 'bla_tilar', 'frameless' ),
	'img_page'                => array( '1', 'paġna=$1', 'paġna $1', 'page=$1', 'page $1' ),
	'img_upright'             => array( '1', 'wieqaf', 'wieqaf=$1', 'wieqaf $1', 'upright', 'upright=$1', 'upright $1' ),
	'img_border'              => array( '1', 'bordura', 'burdura', 'border' ),
	'img_baseline'            => array( '1', 'bażi_tal-linja', 'baseline' ),
	'img_sub'                 => array( '1', 'bid', 'sub' ),
	'img_super'               => array( '1', 'tajjeb', 'super', 'sup' ),
	'img_top'                 => array( '1', 'fuq', 'top' ),
	'img_text_top'            => array( '1', 'test-fuq', 'text-top' ),
	'img_bottom'              => array( '1', 'taħt', 'bottom' ),
	'img_text_bottom'         => array( '1', 'test-taħt', 'text-bottom' ),
	'img_link'                => array( '1', 'ħolqa=$1', 'link=$1' ),
	'sitename'                => array( '1', 'ISEMTAS-SIT', 'SITENAME' ),
	'ns'                      => array( '0', 'IS:', 'NS:' ),
	'localurl'                => array( '0', 'URLLOKALI:', 'LOCALURL:' ),
	'localurle'               => array( '0', 'URLLOKALIE:', 'LOCALURLE:' ),
	'servername'              => array( '0', 'ISEMTAS-SERVER', 'SERVERNAME' ),
	'scriptpath'              => array( '0', 'DESTINAZZJONITA\'SKRITT', 'SCRIPTPATH' ),
	'grammar'                 => array( '0', 'GRAMMATIKA:', 'GRAMMAR:' ),
	'gender'                  => array( '0', 'SESS:', 'GENDER:' ),
	'notitleconvert'          => array( '0', '__EBDAKONVERTURTITLU__', '__EBDAKT__', '__NOTITLECONVERT__', '__NOTC__' ),
	'nocontentconvert'        => array( '0', '__EBDAKONVERTURKONTENUT__', '__EBDAKK__', '__NOCONTENTCONVERT__', '__NOCC__' ),
	'currentweek'             => array( '1', 'ĠIMGĦAKURRENTI', 'CURRENTWEEK' ),
	'currentdow'              => array( '1', 'ĠTĠKURRENTI', 'CURRENTDOW' ),
	'localweek'               => array( '1', 'ĠIMGĦALOKALI', 'LOCALWEEK' ),
	'localdow'                => array( '1', 'ĠTĠLOKALI', 'LOCALDOW' ),
	'revisionid'              => array( '1', 'IDTAR-REVIŻJONI', 'REVISIONID' ),
	'revisionday'             => array( '1', 'ĠURNATATAR-REVIŻJONI', 'REVISIONDAY' ),
	'revisionday2'            => array( '1', 'ĠURNATATAR-REVIŻJONI2', 'REVISIONDAY2' ),
	'revisionmonth'           => array( '1', 'XAHARTAR-REVIŻJONI', 'REVISIONMONTH' ),
	'revisionyear'            => array( '1', 'SENATAR-REVIŻJONI', 'REVISIONYEAR' ),
	'revisiontimestamp'       => array( '1', 'TIMBRUTAR-REVIŻJONI', 'REVISIONTIMESTAMP' ),
	'fullurl'                 => array( '0', 'URLSĦIĦA:', 'FULLURL:' ),
	'fullurle'                => array( '0', 'URLSĦIĦAE:', 'FULLURLE:' ),
	'lcfirst'                 => array( '0', 'IBDAKŻ:', 'LCFIRST:' ),
	'ucfirst'                 => array( '0', 'IBDAKK:', 'UCFIRST:' ),
	'lc'                      => array( '0', 'KŻ:', 'LC:' ),
	'uc'                      => array( '0', 'KK:', 'UC:' ),
	'displaytitle'            => array( '1', 'URITITLU', 'DISPLAYTITLE' ),
	'newsectionlink'          => array( '1', '__ĦOLQASEZZJONIĠDIDA__', '__NEWSECTIONLINK__' ),
	'nonewsectionlink'        => array( '1', '__EBDAĦOLQASEZZJONIĠDIDA__', '__NONEWSECTIONLINK__' ),
	'currentversion'          => array( '1', 'VERŻJONIKURRENTI', 'CURRENTVERSION' ),
	'urlencode'               => array( '0', 'URLKODIĊI:', 'URLENCODE:' ),
	'anchorencode'            => array( '0', 'ANKRAKODIĊI', 'ANCHORENCODE' ),
	'currenttimestamp'        => array( '1', 'TIMBRUTAL-ĦINKURRENTI', 'CURRENTTIMESTAMP' ),
	'localtimestamp'          => array( '1', 'TIMBRUTAL-ĦINLOKALI', 'LOCALTIMESTAMP' ),
	'directionmark'           => array( '1', 'MARKATAD-DIREZZJONI', 'MARKADIRE', 'DIRECTIONMARK', 'DIRMARK' ),
	'language'                => array( '0', '#LINGWA:', '#LANGUAGE:' ),
	'contentlanguage'         => array( '1', 'LINGWATAL-KONTENUT', 'LINGKONTENUT', 'CONTENTLANGUAGE', 'CONTENTLANG' ),
	'pagesinnamespace'        => array( '1', 'PAĠNIFL-ISPAZJUTAL-ISEM:', 'PAĠNISI:', 'PAGESINNAMESPACE:', 'PAGESINNS:' ),
	'numberofadmins'          => array( '1', 'NUMRUTA\'AMMIN', 'NUMBEROFADMINS' ),
	'padleft'                 => array( '0', 'PADXELLUG', 'PADLEFT' ),
	'padright'                => array( '0', 'PADLEMIN', 'PADRIGHT' ),
	'special'                 => array( '0', 'speċjali', 'special' ),
	'defaultsort'             => array( '1', 'DEFAULTSORTJA:', 'DEFAULTSORTJAĊAVETTA:', 'DEFAULTKATEGORIJISORTJA:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ),
	'filepath'                => array( '0', 'DESTINAZZJONITAL-FAJL:', 'FILEPATH:' ),
	'tag'                     => array( '0', 'tabella', 'tag' ),
	'hiddencat'               => array( '1', '__KATMOĦBIJA__', '__HIDDENCAT__' ),
	'pagesincategory'         => array( '1', 'PAĠNIFIL-KATEGORIJA', 'PAĠNIFILK', 'PAGESINCATEGORY', 'PAGESINCAT' ),
	'pagesize'                => array( '1', 'DAQSTAL-PAĠNI', 'PAGESIZE' ),
	'index'                   => array( '1', '__INDIĊI__', '__INDEX__' ),
	'noindex'                 => array( '1', '__EBDAINDIĊI__', '__NOINDEX__' ),
	'numberingroup'           => array( '1', 'NUMRUFIL-GRUPP', 'NUMFIL-GRUPP', 'NUMBERINGROUP', 'NUMINGROUP' ),
	'staticredirect'          => array( '1', '__RIINDIRIZZSTATIKU__', '__STATICREDIRECT__' ),
	'protectionlevel'         => array( '1', 'LIVELLITA\'PROTEZZJONI', 'PROTECTIONLEVEL' ),
	'formatdate'              => array( '0', 'formatdata', 'dataformat', 'formatdate', 'dateformat' ),
);

$pluralRules = [
	"n = 1",
	"n = 0 or n % 100 = 2..10",
	"n % 100 = 11..19",
];

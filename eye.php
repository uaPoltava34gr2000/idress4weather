<?php
    $file="base_bot";        //имя файла с логами ботов
    $col_zap=2499;            //записей в логе ботов
    $xxx=trim(strip_tags($_SERVER['HTTP_USER_AGENT']));
    if (strpos($xxx, 'YandexBot')!==false) {$bot='YandexBot';}
    elseif (strpos($xxx, 'Googlebot')!==false) {$bot='Googlebot';}
    elseif (strpos($xxx, 'bingbot')!==false) {$bot='Bingbot';}
    elseif (strpos($xxx, 'Mail')!==false) {$bot='Mail.ru';}
    elseif (strpos($xxx, 'YandexBlogs')!==false) {$bot='YandexBlogs';}
    elseif (strpos($xxx, 'YandexImage')!==false) {$bot='YandexImages';}
    elseif (strpos($xxx, 'YandexFavicons')!==false) {$bot='YandexFavicons';}
    elseif (strpos($xxx, 'YandexDirect')!==false) {$bot='YandexDirect';}
    elseif (strpos($xxx, 'YandexNews')!==false) {$bot='YandexNews';}
    elseif (strpos($xxx, 'YandexSomething')!==false) {$bot='YandexSomething';}
    elseif (strpos($xxx, 'YandexMetrika')!==false) {$bot='YandexMetrika';}
    elseif (strpos($xxx, 'YandexAntivirus')!==false) {$bot='YandexAntivirus';}
    elseif (strpos($xxx, 'Feedfetcher-Google')!==false) {$bot='Feedfetcher-Google';}
    elseif (strpos($xxx, 'Googlebot-Image')!==false) {$bot='Googlebot-Image';}
    elseif (strpos($xxx, 'Yahoo')!==false) {$bot='Yahoo!';}
    elseif (strpos($xxx, 'WebCrawler')!==false) {$bot='WebCrawler';}
    elseif (strpos($xxx, 'ZyBorg')!==false) {$bot='ZyBorg';}
    elseif (strpos($xxx, 'Scooter')!==false) {$bot='AltaVista';}
    elseif (strpos($xxx, 'StackRambler')!==false) {$bot='Rambler';}
    elseif (strpos($xxx, 'Aport')!==false) {$bot='Aport';}
    elseif (strpos($xxx, 'lycos')!==false) {$bot='Lycos';}
    elseif (strpos($xxx, 'fast')!==false) {$bot='Fast Search';}
    elseif (strpos($xxx, 'msnbot')!==false) {$bot='MSN';}
    elseif (strpos($xxx, 'Nigma.ru')!==false) {$bot='Nigma';}
    elseif (strpos($xxx, 'ia_archiver')!==false) {$bot='Alexa';}
    elseif (strpos($xxx, 'Baiduspider')!==false) {$bot='Baidu';}
    elseif (strpos($xxx, 'Exabot')!==false) {$bot='Exabot';}
    elseif (strpos($xxx, 'archive.org_bot')!==false) {$bot='Archive.org';}
    elseif (strpos($xxx, 'Ezooms')!==false) {$bot='Ezooms';}
    elseif (strpos($xxx, 'GrepNetstat.com Bot')!==false) {$bot='GrepNetstat.com';}
    elseif (strpos($xxx, 'MJ12bot')!==false) {$bot='Majestic-12';}
    elseif (strpos($xxx, 'AhrefsBot')!==false) {$bot='Ahrefs';}
    elseif (strpos($xxx, 'TurnitinBot')!==false) {$bot='Turnitin';}
    elseif (strpos($xxx, 'discobot')!==false) {$bot='Discobot';}
    elseif (strpos($xxx, 'Subscribe.Ru')!==false) {$bot='Subscribe';}
    elseif (strpos($xxx, 'TOP.NET.RU')!==false) {$bot='TOP.NET.RU';}
    elseif (strpos($xxx, 'SISTRIX Crawler')!==false) {$bot='SISTRIX';}
    elseif (strpos($xxx, 'Wotbox')!==false) {$bot='Wotbox';}
    else {
        $file="base_user";        //имя файла с логами пользователей
        $col_zap=3499;          //записей в логе пользователей
        $bot=htmlspecialchars(substr($xxx,0,80));//обрезаем USER-AGENT до 80 символов
    }
    // my ip not write 127.0.0.1 ifconfig | less
     if ($_SERVER['REMOTE_ADDR']!='192.168.0.84') {
    //записываем логи в файл с блокировкой
    $l_cash='';
    $fh=fopen($file,"a+");
    flock($fh,LOCK_EX);
    fseek($fh,0);
    while (!feof($fh)) $l_cash.= fread($fh,8192);
    $lines=explode("\n",$l_cash);
    while(count($lines)>$col_zap) array_shift($lines);
    $l_cash=implode("\n",$lines);
    $l_cash.=date("H:i:s d.m")."|".$bot."|".$_SERVER['REMOTE_ADDR']."|".
        htmlspecialchars($_SERVER['REQUEST_URI'])."\n";
    ftruncate($fh,0);
    fwrite($fh,$l_cash);
    flock($fh,LOCK_UN);
    fclose($fh);
    }
    ?>

<?php
session_start();
include "header.php";
$rss_href = "https://www.lapresse.ca/societe/animaux/rss";
$rss = simplexml_load_file($rss_href);
$newHtml = '';

$table;

function sub($txt)
{
   $max_lenght = 65;

   if (strlen($txt) > $max_lenght) {
      $txt = substr($txt, 0, $max_lenght);
      $position_esp = strrpos($txt, " ");
      $txt = substr($txt, 0, $position_esp);
   }
   return $txt . "[...]";
}
$table = [];
$i = 0;
foreach ($rss->channel->item as $item) {
   setlocale(LC_TIME, 'fr-FR.utf8');
   $dateTime = $item->pubDate;
   $date = strftime("%A %d %B %Y", strtotime("$dateTime"));

   $newHtml = '<article class="inf"><div class="contenu"><p class="calendar">' . ucwords($date) . '</p><h3><a  class="titre_article" href="#openModal' . $i . '">"' . $item->title . '"</a></div>';
   $newHtml .= '<p class="txt">"' . sub($item->description) . '"</p>';
   $modalHtml = '<article class="inf"><div class="contenu"><p class="calendar">' . ucwords($date) . '</p><a class="lien" href=' . $item->link . '><h3>"' . $item->title . '"</h3></a></div>';
   $modalHtml .= '<img src="' . $item->enclosure['url'] . '"class="img"/><p class="txt">"' . $item->description . '"</p>';
   array_push($table, ['aside' => $newHtml, 'modal' => $modalHtml]);
   $i++;
}



include "index.phtml";
include "footer.php";

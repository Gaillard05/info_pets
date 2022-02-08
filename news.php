<?php
session_start();
include "header.php";

$rss_href = "https://www.lapresse.ca/societe/animaux/rss";
$rss = simplexml_load_file($rss_href);
$newHtml = '';

foreach ($rss->channel->item as $item) {
  setlocale(LC_TIME, 'fr-FR.utf8');
  $dateTime = $item->pubDate;
  $date = strftime("%A %d %B %Y", strtotime("$dateTime"));

  $newHtml .= '<article class="news"><div><p>' . ucwords($date) . '</p><a class="lien" href=' . $item->link . '>"' . $item->title . '"</a></div>';
  $newHtml .= '<img class="img-article" src="' . $item->enclosure['url'] . '"/><p class="description">"' . $item->description . '"</p>';
}



include "news.phtml";
include "footer3.php";

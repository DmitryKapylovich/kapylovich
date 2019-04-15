<?php

$news[0]="Появилось видео спора Порошенко и Зеленского в прямом эфире";
$news[1]="Медведев утвердил правила автотюнинга";
$news[2]="СК объявил в розыск экс-главу Минобороны Украины Гриценко";
$news[3]="В США призвали к пересмотру отношений с Россией";
$news[4]="В Воронежской области строится рекордное количество соцобъектов";
$news[5]="Хакеры Anonymous пригрозили британским властям после ареста Ассанжа";
$news[6]="В Воронеже ко Дню космонавтики выстроили ракету из машин";
$news[7]="В Воронежской области задержали 20 тонн украинских семечек";
$news[8]="Платоновфест начал поиск волонтеров в Воронеже";
$news[9]="ВЭБ оценит целесообразность строительства легкого метро в Воронеже";
  /* Входные параметры */
  $count_pages = 10;
  $active = 5;
  $count_show_pages = 10;
  $url = "/kapylovich/paginator.php?page=1";
  $url_page = "/kapylovich/paginator.php?page=";
  if ($count_pages > 1) { // Всё это только если количество страниц больше 1
    /* Дальше идёт вычисление первой выводимой страницы и последней (чтобы текущая страница была где-то посредине, если это возможно, и чтобы общая сумма выводимых страниц была равна count_show_pages, либо меньше, если количество страниц недостаточно) */
    $left = $active - 1;
    $right = $count_pages - $active;
    if ($left < floor($count_show_pages / 2)) $start = 1;
    else $start = $active - floor($count_show_pages / 2);
    $end = $start + $count_show_pages - 1;
    if ($end > $count_pages) {
      $start -= ($end - $count_pages);
      $end = $count_pages;
      if ($start < 1) $start = 1;
    }
    
      if (
          isset($_REQUEST["page"]) 
          && 
          intval($_REQUEST["page"])!==$_REQUEST["page"] 
          && 
          $_REQUEST["page"]>=0 
          && 
          $_REQUEST["page"]<=$count_pages
      ){
          echo $news[$_REQUEST["page"]-1];
      }
?>
  <!-- Дальше идёт вывод Pagination -->
  <div id="pagination">
    <span>Новости: </span>
    <?php if ($active != 1) { ?>
      <a href="<?=$url?>" title="Первая новость">&lt;&lt;&lt;</a>
      <a href="<?php if ($active == 2) { ?><?=$url?><?php } else { ?><?=$url_page.($active -1)?><?php } ?>" title="Предыдущая новость">&lt;</a>
    <?php } ?>
    <?php for ($i = $start; $i <= $end; $i++) { ?>
      <?php if ($i == $active) { ?><span><?=$i?></span><?php } else { ?><a href="<?php if ($i == 1) { ?><?=$url?><?php } else { ?><?=$url_page.$i?><?php } ?>"><?=$i?></a><?php } ?>
    <?php } ?>
    <?php if ($active != $count_pages) { ?>
      <a href="<?=$url_page.($active + 1)?>" title="Следующая новость">&gt;</a>
      <a href="<?=$url_page.$count_pages?>" title="Последняя новость">&gt;&gt;&gt;</a>
    <?php } ?>
  </div>
<?php } ?>
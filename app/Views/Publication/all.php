<?php setlocale(LC_TIME, 'esp');  // Establece el idioma español para la función strftime() ?>
<div class="container">
    <?php foreach ($posts as $item):    // Estos son los datos enviados desde el controlador. 
                                        // Recorre el array de publicaciones y muestra cada una. ?> 
            <div class="card-body">
                <strong>Usuario</strong>
                <small><?php
                    //  NOTA: strftime() es una función de PHP. Formatea la fecha en un formato específico.
                    //  Pero desde la versión 8.1 de PHP, se recomienda usar IntlDateFormatter, ya que no se reconoce.  
                    $date = new DateTime($item['posted_time']);
                    $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::SHORT);
                    $formatter->setPattern('EEEE, d \'de\' MMMM \'de\' Y H:mm');
                    echo $formatter->format($date);
                ?></small>
                <p class="card-text"><?= $item['content'];?></p>   
    <?php endforeach; ?>
</div>

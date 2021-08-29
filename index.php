<?php
date_default_timezone_set('America/Sao_Paulo');
require_once("functions.php");

  echo  "<link rel='stylesheet' href='style.css'>";
  
  $mes_extenso = array(
    'Jan' => 'Janeiro',
    'Feb' => 'Fevereiro',
    'Mar' => 'Março',
    'Apr' => 'Abril',
    'May' => 'Maio',
    'Jun' => 'Junho',
    'Jul' => 'Julho',
    'Aug' => 'Agosto',
    'Nov' => 'Novembro',
    'Sep' => 'Setembro',
    'Oct' => 'Outubro',
    'Dec' => 'Dezembro'
);
  
  $monthTime = getMonthTime();
  echo "<header>";
  echo '<a href=" ?month='.prevMonth($monthTime).'">Anterior</a>';
  echo "<h1>".$mes_extenso[date('M', $monthTime)]."</h1>";
  echo '<a href=" ?month='.nextMonth($monthTime).'">Próximo</a>';
  echo "</header>";


echo "<table>";

echo  "<thead>
        <th>DOM</th>
        <th>SEG</th>
        <th>TER</th>
        <th>QUA</th>
        <th>QUI</th>
        <th>SEX</th>
        <th>SAB</th>
    </thead>
  ";
  

  $startDate = strtotime("last sunday", $monthTime);

  echo "<tbody>";

// tr - table row - linhas
// td - table data - dados ou célula

   for($row = 0; $row < 6; $row++) {

     echo "<tr>";

      for($column = 0; $column < 7; $column++) {
        
        if (date('Y-m', $startDate) !== date('Y-m', $monthTime)) {
          echo "<td class='other-month'>";
        } else {
          echo "<td>";
        }
          echo date('j', $startDate);
          echo "</td>";

        // Incrementar a $startDate porque se não todo dia é dia 1
        $startDate = strtotime("+1 Day", $startDate);

      }

     echo "</tr>";

   }

echo "</tbody>";

echo "</table>";

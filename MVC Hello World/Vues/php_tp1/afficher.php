<?php

echo "<p>" . $A_vue['nbPersonneMax']  . "</p>";

echo
  "<table>";
    $count = 0;
    $nbColonne = $A_vue['nbPersonneMax'];

    for ($i = 0; $i < count($A_vue['listeEtudiant']); ++$i) {
        if ($count == 0) {
            echo "<tr><td>" . $A_vue['listeEtudiant'][$i] . "</td>";

        } elseif($count != 0 && $count != $nbColonne-1) {
            echo "<td>" . $A_vue['listeEtudiant'][$i] . "</td>";
        }

        $count++;

        if ($nbColonne == 1) {
            echo "</tr>";
            $count = 0;
        }

        if ($count == $nbColonne && $nbColonne != 1) {
            echo "<td>" . $A_vue['listeEtudiant'][$i] . "</td></tr>";
            $count = 0;

        }
    }

echo "</table>" ;
<?php

class __Mustache_3d50b135a460434f63ca31cb7a32a3a2 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<html>
';
        $buffer .= $indent . '	<head>
';
        $buffer .= $indent . '			<title>KEA - Kursequippen Anmeldung</title>
';
        $buffer .= $indent . '	</head>
';
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '<div>
';
        $buffer .= $indent . '	<form action=\'/save\' method=\'POST\' name=\'save\'>
';
        $buffer .= $indent . '	<h1>Kursequippen Anmeldung</h1>
';
        $buffer .= $indent . '	<p class=\'year\'>Kurssaison ';
        $value = $this->resolveValue($context->find('year'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<p>Auch diese Jahr organisiert die AuRe5 Vorbasis & J+S Basis- & Aubau-Kurse. Damit wir Dich und deine Wünsch bei der Kursvergabe resp. Equippenverteilung berücksichtigen können, musst du dich hier eintragen.</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<h2>Daten</h2>
';
        $buffer .= $indent . '	<table>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<th>Was?</th>
';
        $buffer .= $indent . '			<th>Wann?</th>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td>Anmeldefrist Equippe</td>
';
        $buffer .= $indent . '			<td27. Oktober 2014 um 17.00 Uhrtd>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td>Equippenverteilerh&ouml;ck</td>
';
        $buffer .= $indent . '			<td>27. Oktober 2014 ab 19.00 Uhr</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td colspan=\'2\'>&nbsp;</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td>Vorweekends</td>
';
        $buffer .= $indent . '			<td>3.-5. April 2015</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td>Kurswoche</td>
';
        $buffer .= $indent . '			<td>18.-25. April 2015</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td colspan=\'2\'>&nbsp;</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td>Ablat</td>
';
        $buffer .= $indent . '			<td>8. Mai 2015</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '	</table>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<h2>Kurse</h2>
';
        $buffer .= $indent . '	<p>Gib hier unten an, für welche Kurs du dich interresierts. Bitte gebe ebenfalls auch die Prioritäten an bezüglich den einzelnen Kursen.</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<h2>Pers&ouml;hnliche Angaben</h2>
';
        $buffer .= $indent . '	<p>Damit wir dich am optimalsten einteilen können oder bei Unklarheiten anrufen können benötigen wir noch einige Angaben von Dir. Bitte stelle sichr, dass du während dem Höck (siehe oben Kapital "Infos & Daten") telefonisch erreichbar bist.</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<table>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td>Pfadiname</td>
';
        $buffer .= $indent . '			<td><input type=\'text\' name-\'pfadiname\' id=\'pfadiname\' placeholder="Taze"/></td>
';
        $buffer .= $indent . '			<td>&nbsp;</td>
';
        $buffer .= $indent . '			<td>Ich habe Erfahrung in der</td>
';
        $buffer .= $indent . '			<td><input type=\'checkbox\' name=\'erfahrung_1_stufe\' id=\'erfahrung_1_stufe\' value=\'1\' /> 1. Stufe und/oder <input type=\'checkbox\' name=\'erfahrung_2_stufe\' id=\'erfahrung_2_stufe\' value=\'2\'/> 2. Stufe</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td>E-Mail-Adresse</td>
';
        $buffer .= $indent . '			<td><input type=\'text\' name-\'email\' id=\'email\' placeholder="taze@aure5.ch" pattern="[_a-z0-9-]+(\\.[_a-z0-9-]+)*@[a-z0-9-]+(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})" title="Ung&uuml;ltige E-mail Adresse">/></td>
';
        $buffer .= $indent . '			<td>&nbsp;</td>
';
        $buffer .= $indent . '			<td>Aktuell leite ich in der</td>
';
        $buffer .= $indent . '			<td><input type=\'radio\' name=\'geleitet_in\' id=\'geleitet_in_1\' value=\'1\' /> 1. Stufe oder <input type=\'radio\' name=\'geleitet_in\' id=\'geleitet_in_2\' value=\'2\' /> 2. Stufe</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<td>Natelnummer</td>
';
        $buffer .= $indent . '			<td><input type=\'text\' name-\'mobile\' id=\'mobile\' placeholder="079 123 45 67" pattern="([0-9]{10})|(\\s*[0-9]{3}\\s*[0-9]{3}\\s*[0-9]{2}\\s*[0-9]{2}\\s*)" title="Ung&uuml;ltige Natelnummer">/></td>
';
        $buffer .= $indent . '			<td>&nbsp;</td>
';
        $buffer .= $indent . '			<td>Panoramekurs besucht ?</td>
';
        $buffer .= $indent . '			<td><input type=\'radio\' name=\'panorama\' id=\'panorame_ja\' value=\'1\' /> Ja  <input type=\'radio\' name=\'panorama\' id=\'panorame_nein\' value=\'0\' />Nein</td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '		<tr>Abteilung</td>
';
        $buffer .= $indent . '			<td>
';
        $buffer .= $indent . '				<select name=\'abteilung\' id=\'abteilung\'>
';
        $buffer .= $indent . '				  <optgroup label="Region Hochwacht">
';
        $buffer .= $indent . '				    <option value="1">Pfadi Chopfholz</option>
';
        $buffer .= $indent . '				    <option value="2">Pfadi WRA</option>
';
        $buffer .= $indent . '				  </optgroup>
';
        $buffer .= $indent . '				  <optgroup label="Korps Hamswaldmann">
';
        $buffer .= $indent . '				    <option value="4">Pfadi AF</option>
';
        $buffer .= $indent . '				    <option value="5">Pfadi RB</option>
';
        $buffer .= $indent . '				  </optgroup>
';
        $buffer .= $indent . '				</select>
';
        $buffer .= $indent . '			</td>
';
        $buffer .= $indent . '			<td>&nbsp;</td>
';
        $buffer .= $indent . '			<td colspan=\'2\'><textarea name-\'bemerkung\' id=\'bemerkung\' placeholder="Bemerkung..."></textarea></td>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '	</table>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<input type=\'submit\' value=\'Absenden\' id=\'submit\' />
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	</form>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}

<?php
function productos_json(&$boletos, &$etiquetas=0, &$camisa = 0){
  $dias = array(0 => 'un_dia' , 1 => 'pase_completo', 2=> 'dos_dias');
  $total_boletos = array_combine($dias, $boletos);
  $json = array();

  foreach($total_boletos as $key => $boletos):
    if((int) $boletos > 0):
      $json[$key] = (int) $boletos;
    endif;
  endforeach;

  $camisas = (int) $camisa;
  if($camisas > 0):
    $json['camisas'] = $camisas;
  endif;

  $etiqueta = (int) $etiquetas;
  if($etiqueta > 0):
    $json['etiqueta'] = $etiqueta;
  endif;

  return json_encode($json);

}

function eventos_json(&$eventos){
  $eventos_json = array();

  foreach($eventos as $evento):
    $eventos_json['eventos'][] = $evento;
  endforeach;

  return json_encode($eventos_json);
}

?>

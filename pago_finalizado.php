<?php

     include_once './includes/templates/header.php';
     use PayPal\Rest\ApiContext;
     use PayPal\Api\PaymentExecution;
     use PayPal\Api\Payment;

     require 'includes/paypal.php'

?>

<section class="seccion contenedor">
       <h2>Resumen Registro</h2>
       <?php

        $paymentId = $_GET['paymentId'];
        $id_registro =(int) $_GET['id_pago'];

        //PETICON REST API A PAYPAL PARA VALIDAR LA TARNSACCION
        $pago = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $resultado = $pago->execute($execution, $apiContext);

        $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

        if($respuesta == "completed"){
            echo "El pago fue exitoso  <br>";
            echo "ID: " . ($paymentId);

            try {
              require_once('includes/funciones/db_conexion.php');
              $stmt = $conn->prepare("UPDATE registrados SET pagado=? WHERE id_registrado=? ");
              $pagado = 1;
              $stmt->bind_param("ii", $pagado, $id_registro);
              $stmt->execute();
              $stmt->close();
              $conn->close();
              // header('Location:validar_registro.php?exitoso=1');
            } catch (\Exception $e) {
              echo $e->getMessage();
            }

        }else{
            echo "El pago no fue exitoso";
        }

        ?>

</section>

<?php include_once './includes/templates/footer.php' ?>

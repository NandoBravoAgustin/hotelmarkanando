<?php


    $room_actual = $_GET["room"];
    $fecha_ida = $_GET["fecha_ida"];
    $fecha_vuelta = $_GET["fecha_vuelta"];
    $num_personas = $_GET["num_personas"];
    $id_reserva = $_GET["id"];
    $price = $_GET["price"];
    $dni = $_GET["dni"];
    $cliente = $_GET["cliente"];
    $total = $_GET["total"];
    $dias = $_GET["dias"];



    # Incluyendo librerias necesarias #
    require "./code128.php";
    
    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Markanando Hotel")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("RUC: 0000000000"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Direccion: Buenos Aires, Argentina"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: +54 9 3522650395"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: nicnando123@gmail.com"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y")." ".date("h:s A")),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Cantidad de Personas: ".$num_personas),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Cajero: Nando Bravo"),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Codigo de Reserva : ".$id_reserva)),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Cliente : ".$cliente),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Documento: DNI ".$dni),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: +54 9 3522 455475"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Dirección: Buenos Aires, Argentina"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(10,5,utf8_decode("Noches"),0,0,'C');
    $pdf->Cell(19,5,utf8_decode("Desde"),0,0,'C');
    $pdf->Cell(15,5,utf8_decode("Hasta"),0,0,'C');
    $pdf->Cell(28,5,utf8_decode("Precio"),0,0,'C');


    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);



    /*----------  Detalles de la tabla  ----------*/

    $pdf->Ln(1);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("||Reserva / habitacion : ").$room_actual."||"),0,'C',false);
    $pdf->Ln(2);
    $pdf->Cell(10,4,utf8_decode($dias),0,0,'C');
    $pdf->Cell(19,4,utf8_decode($fecha_ida."  /"),0,0,'C');
    $pdf->Cell(19,4,utf8_decode($fecha_vuelta),0,0,'C');
    $pdf->Cell(28,4,utf8_decode("$".$total),0,0,'C');
    $pdf->Ln(4);
    // $pdf->Cell(0,4,utf8_decode("Garantía de fábrica: 2 Meses"),0,'C',false);
    $pdf->Ln(7);
    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

        $pdf->Ln(5);

    # Impuestos & totales #
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("+".$total." USD"),0,0,'C');

    $pdf->Ln(5);

    $iva = 0.13;
    $total_iva = $iva * $total;
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("IVA (13%)"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("+ ".$total_iva." USD"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);
    $total_pagar = $total_iva + $total;
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$".$total_pagar),0,0,'C');

    $pdf->Ln(5);
    $mil = 1000;
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL PAGADO"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$".$mil.".00 USD"),0,0,'C');

    $pdf->Ln(5);
    $cambio = $mil - $total_pagar;
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("CAMBIO"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$".$cambio.".00 USD"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("USTED AHORRA"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$0.00 USD"),0,0,'C');

    $pdf->Ln(10);

    $pdf->MultiCell(0,5,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su compra"),'',0,'C');

    $pdf->Ln(19);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD002001V0001",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,utf8_decode("COD002001V0001"),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_".$cliente."_$id_reserva.pdf",true);

<?php
require('fpdf/fpdf.php');

require_once 'db_config.php';

class PDF extends FPDF
{
    function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));

        $xc = $x+$w-$r;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
        if (strpos($corners, '2')===false)
            $this->_out(sprintf('%.2F %.2F l', ($x+$w)*$k,($hp-$y)*$k ));
        else
            $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);

        $xc = $x+$w-$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        if (strpos($corners, '3')===false)
            $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-($y+$h))*$k));
        else
            $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);

        $xc = $x+$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        if (strpos($corners, '4')===false)
            $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-($y+$h))*$k));
        else
            $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);

        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        if (strpos($corners, '1')===false)
        {
            $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$y)*$k ));
            $this->_out(sprintf('%.2F %.2F l',($x+$r)*$k,($hp-$y)*$k ));
        }
        else
            $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }
}



$tipo = 'tarjeta';
/*
$nombre = $_POST['propietario'];
$folio = $_POST['folio'];
$nombre_comercial = $_POST['nombre_comercial'];
$id_cargo = $_POST['id_cargo'];
$monto = $_POST['monto'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha']; 
$hora = $_POST['hora']; 
*/ 

$nombre = 'Abel';
$folio = '12345';
$id_cargo = 'avc657gjd8';
$monto = '800';
$descripcion = 'descripcion';
$fecha = '26/05/2020'; 
$hora = '04:48'; 
$op='opción';
$opcion=utf8_decode($op);
$num='teléfono'; 
$tel=utf8_decode($num);

$neg='Dulcerías Wonka'; 
$negocio=utf8_decode($neg);



$pdf = new PDF();
$pdf->AddPage();

$pdf->Ln(0); 
$pdf->SetFont('Arial','',15);
$pdf->Cell(55,0,$negocio,0,0,'C',0);

$pdf->Ln(0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(240,0,"Comprobante de Pago",0,0,'C',0);   

$pdf->Ln(0);
//$pdf->Image('img/ventos_pdf.png','150','2','35','10');


//1
$pdf->Ln(5); 
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(7, 153, 146);
$pdf->SetFillColor(7, 153, 146);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(7, 153, 146);
$pdf->Cell(15,10,"NOMBRE",1,0,'C',1);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(110,10,$nombre);

$pdf->Ln(11); 
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(7, 153, 146);
$pdf->SetFillColor(7, 153, 146);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(7, 153, 146);
$pdf->Cell(15,10,"FECHA",1,0,'C',1); 
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(110,10,$fecha);

$pdf->Ln(11); 
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(7, 153, 146);
$pdf->SetFillColor(7, 153, 146);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(7, 153, 146);
$pdf->Cell(15,10,"FOLIO",1,0,'C',1);
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(110,10,$folio);
//1

//2
$pdf->SetY(16);
$pdf->SetX(112);
$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(7, 153, 146);
$pdf->SetFillColor(7, 153, 146);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(7, 153, 146);
$pdf->Cell(80,10,"Total pagado:",1,0,'L',1);

$pdf->SetY(23);
$pdf->SetX(112);
$pdf->SetFont('Arial','',18);
$pdf->SetDrawColor(7, 153, 146);
$pdf->SetFillColor(7, 153, 146);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(7, 153, 146);
$pdf->Cell(80,16,'$'.$monto.' MXN',1,0,'C',1);

$pdf->SetY(38);
$pdf->SetX(112);
$pdf->SetFont('Arial','',6);
$pdf->SetDrawColor(7, 153, 146);
$pdf->SetFillColor(7, 153, 146);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(7, 153, 146);
$pdf->Cell(80,4,'La comision por recepcion del pago varia de acuerdo a',1,0,'C',1);

$pdf->SetY(42);
$pdf->SetX(112);
$pdf->SetFont('Arial','',6);
$pdf->SetDrawColor(7, 153, 146);
$pdf->SetFillColor(7, 153, 146);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(7, 153, 146);
$pdf->Cell(80,4,'los terminos y condiciones que cada cadena comercial establece.',1,0,'C',1);
//2


////DATOS DEL COLEGIO 
//3
$pdf->Ln(15);
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(0,0,0);
//$pdf->Image('img/bolsa_naranja.png','10','53','10','12');
$pdf->Cell(60,10,"Datos del Colegio",0,0,'C',0);


$stmt=$db_con->prepare("SELECT * FROM colegios WHERE nombre_comercial = 'america'");
$stmt->execute();
$nombre_comercial = "";
$rfc = "";
$estado = "";
$ciudad = "";
$telefono = "";
$correo = "";
if($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
$nombre_comercial = $row['nombre_comercial'];
$rfc = $row['rfc'];
$estado = $row['estado'];
$ciudad = $row['ciudad'];
$telefono = $row['telefono'];
$correo = $row['correo'];
}

$pdf->Ln(10);
$pdf->SetDrawColor(192,192,192);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'NOMBRE',1,0,'C',1);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$nombre_comercial,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(220,220,220);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'RFC',1,0,'C',1);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$rfc,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(192,192,192);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'Estado',1,0,'C',1);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$estado,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(220,220,220);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'Ciudad',1,0,'C',1);
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$ciudad,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(192,192,192);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'Telefono',1,0,'C',1);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$telefono,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(220,220,220);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'Correo',1,0,'C',1);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$correo,1,0,'C',1);
//3
////DATOS DEL COLEGIO

////DATOS DEL CARGO 
//4
$pdf->Ln(20);
$pdf->SetFont('Arial','',13);
//$pdf->Image('img/bolsa_naranja.png','10','136','10','12');
$pdf->Cell(58,15,"Datos del Cargo",0,0,'C',0);

$pdf->Ln(13);
$pdf->SetDrawColor(192,192,192);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'ID Cargo',1,0,'C',1);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$nombre_comercial,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(220,220,220);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'DESCRIPCION',1,0,'C',1);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$nombre_comercial,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(192,192,192);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'FOLIO',1,0,'C',1);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$nombre_comercial,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(220,220,220);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'IMPORTE',1,0,'C',1);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$nombre_comercial,1,0,'C',1);

$pdf->Ln(10);
$pdf->SetDrawColor(192,192,192);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,'FECHA',1,0,'C',1);
$pdf->SetFillColor(192,192,192);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,10,$nombre_comercial,1,0,'C',1); 
//4
//DATOS DEL CARGO

////HISTORIAL 
//5
$pdf->Ln(20);
$pdf->SetFont('Arial','',13);
//$pdf->Image('img/bolsa_azul.png','10','205','10','12');
$pdf->Cell(78,8,"Consulta Historial de Pago",0,0,'C',0);

$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(63,10,"1. Posiciona el cursor sobre tu nombre",0,0,'C',0);

$pdf->Ln(4);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(58,10,"2. Selecciona la ".$opcion." Mis Pagos",0,0,'C',0);

$pdf->Ln(4);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(79,10,"3. Establecer una fecha de inicio y una fecha de fin",0,0,'C',0);

$pdf->Ln(4);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(42,10,"4. Dar click en buscar",0,0,'C',0);

$pdf->Ln(7);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(97,10,"Si tienes dudas comunicate a Ventos al ".$tel." (871)161-3441",0,0,'C',0);
 
$pdf->Ln(3);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(59,10,"o al correo contacto@ventos.mx",0,0,'C',0);


//5
////HISTORIAL 



//FOOTER 
//6 
$pdf->Ln(10);
$pdf->SetDrawColor(255,165,0);
$pdf->SetFillColor(255,165,0);
$pdf->Cell(180,1,'',1,0,'C',1);

$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180,10,"Recuerda que con ventos puedes hacer pagos en efectivo en tiendas de conveniencia",0,0,'C',0);

$pdf->Ln(4);
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180,10,"Bodega Aurrera, Farmacias Benavides, Waldo's, Extra, Alsuper, Circle K, Walmart, Super Farmacia Guadalajara,",0,0,'C',0);

$pdf->Ln(3);
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180,10,"7Eleven, Sam's, Kiosko y Farmacias del Ahorro",0,0,'C',0);

$pdf->Ln(10);
$pdf->SetDrawColor(255,165,0);
$pdf->SetFillColor(255,165,0);
$pdf->Cell(180,1,'',1,0,'C',1);
//6
 
 
//7
$pdf->Ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180,10,"|",0,0,'C',0);

//$pdf->Image('img/ventos_pdf.png','83','266','15','5');
//$pdf->Image('img/openpay.png','102','267','15','5');
//7
//FOOTER

$pdf->Output();
?>
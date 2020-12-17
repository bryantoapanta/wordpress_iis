<div class="container-fluid">
	<div class='row' id='div-ranking'>
		<div id="rankings" class="col-8 offset-2 rounded">
			<button class="btn btn-outline-light mt-2 cancelar volver">X</button>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">

			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
				<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css">
				<script type="text/javascript" src="https://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.js"></script>

				<title>[CASTOR] - Ranking Online</title>
				<style type="text/css">
					body {
						background-color: #FFFFFF;
					}

					table.blueTable {
						font-family: Verdana, Geneva, sans-serif;
						border: 1px solid #1C6EA4;
						background-color: #EEEEEE;
						width: 45%;
						text-align: left;
						border-collapse: collapse;
					}

					table.blueTable td,
					table.blueTable th {
						border: 1px solid #AAAAAA;
						padding: 3px 2px;
					}

					table.blueTable tbody td {
						font-size: 13px;
					}

					table.blueTable tr:nth-child(even) {
						background: #D0E4F5;
					}

					table.blueTable thead {
						background: #1C6EA4;
						background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
						background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
						background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
						border-bottom: 2px solid #444444;
					}

					table.blueTable thead th {
						font-size: 15px;
						font-weight: bold;
						color: #FFFFFF;
						border-left: 2px solid #D0E4F5;
					}

					table.blueTable thead th:first-child {
						border-left: none;
					}

					table.blueTable tfoot {
						font-size: 14px;
						font-weight: bold;
						color: #FFFFFF;
						background: #D0E4F5;
						background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
						background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
						background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
						border-top: 2px solid #444444;
					}

					table.blueTable tfoot td {
						font-size: 14px;
					}

					table.blueTable tfoot .links {
						text-align: right;
					}

					table.blueTable tfoot .links a {
						display: inline-block;
						background: #1C6EA4;
						color: #FFFFFF;
						padding: 2px 8px;
						border-radius: 5px;
					}
				</style>
				<script>
					$(document).ready(function() {
						$('.tooltip[id^="tooltip_"]').each(function() {
							$(this).qtip({
								content: $(this).find('span.tooltip'),
								hide: {
									fixed: true,
									delay: 180
								}
							});
						});
					});
				</script>
			</head>

			<body>

				<?php
				echo
					"online";
				include('connect_castor.php');

				$connectionInfo = array("Database" => "$databaseCastor", "UID" => "$usernameCastor", "PWD" => "$passwordCastor");
				$conn = sqlsrv_connect($hostnameCastor, $connectionInfo);


				if ($conn) {
					//echo "Conexión establecida.<br />";
				} else {
					echo "Conexión no se pudo establecer.<br />";
					die(print_r(sqlsrv_errors(), true));
					exit();
				}

				if (!isset($_GET['tipo'])) {
					//echo "Sin pedido especificado...";
					//exit();
					$tipo = "";
				} else {
					$tipo = $_GET['tipo'];
				}


				$msc = microtime(true);

				$titulo = "Diario";

				//Aumentamos el tiempo de consulta
				set_time_limit(120);


				//CabeceraTabla();

				$query = "SELECT
			TopRanking = ROW_NUMBER () OVER (

				ORDER BY
					SUM (
						CAST (
							dbo.SALE.TOTALIMPORT AS FLOAT 
						) 
					) DESC
			),
		dbo.SHOP.[IDENTITY] AS idTienda,
		UPPER (dbo.SHOP.INFNAME) AS NOMBRE,
		SUM (
		CAST (
		dbo.SALE.TOTALIMPORT AS FLOAT
				)
			) AS TOTAL
		FROM
			dbo.SHOP
		RIGHT JOIN dbo.SALE ON dbo.SALE.IDENTITYShop = dbo.SHOP.[IDENTITY]
		WHERE";


				if ($tipo == "s") {
					$query = $query . " CAST (dbo.SALE.DATES AS DATE) >= CAST (GETDATE() - 7 AS DATE) ";
					$titulo = "Semanal";
				} else if ($tipo == "m") {
					$query = $query . " CAST (dbo.SALE.DATES AS DATE) >= CAST (GETDATE() - 30 AS DATE) ";
					$titulo = "Mensual";
				} else {
					$query = $query . " CAST (dbo.SALE.DATES AS DATE) >= CAST (GETDATE() AS DATE) ";
				}




				$query = $query . "
		AND dbo.SHOP.LABELOUTPUTTYPE = 1
		and dbo.SHOP.[IDENTITY] NOT IN (54, 63, 42, 24)
		GROUP BY
			dbo.SHOP.[IDENTITY],
			dbo.SHOP.INFNAME
		ORDER BY
			total DESC";

				$result = sqlsrv_query($conn, $query);
				$contH3 = 1;
				$i = 1;

				if (!$result) {
					echo "Error in statement execution.\n";
					die(print_r(sqlsrv_errors(), true));
				}

				echo "<div class='col-12'>";
				echo "<center>";
				echo "<table class='blueTable' width=80vw>";
				echo "<thead>";
				echo "<tr><td style='height:30px'><div align='center'><font size=3 face='tahoma,verdana' color='white'><b>Ranking de Ventas " . $titulo . " </font></b></div></td></tr>";
				echo "<thead>";
				echo "</table>";
				echo "<br>";

				echo "<table class='blueTable' width=80vw>";
				echo "<thead>";
				echo "<tr style='height:20px'>";
				echo "<th width='40'><div align='center'><b>Posición</b></div></td>";
				echo "<th width='130'><div align='center'><b>Tienda</b></div></td>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";


				while ($row = sqlsrv_fetch_array($result)) {

					echo "<tr>";

					if ($i == 1) {
						echo "<td style='height:20px'><div align='center' ><img src='../../images/medalla_primero.png'><span class='tooltip' style='display: none;'>Posicion numero " . $row['TopRanking'] . "</span></div></td>";
					} else if ($i == 2) {
						echo "<td style='height:20px'><div align='center' ><img src='../../images/medalla_segundo.png'><span class='tooltip' style='display: none;'>Posicion numero " . $row['TopRanking'] . "</span></div></td>";
					} else if ($i == 3) {
						echo "<td style='height:20px'><div align='center' ><img src='../../images/medalla_tercero.png'><span class='tooltip' style='display: none;'>Posicion numero " . $row['TopRanking'] . "</span></div></td>";
					} else {
						echo "<td style='height:20px'><div align='center' class='text-dark'>" . $row['TopRanking'] . "</div></td>";
					}


					echo "<td style='height:20px'><div align='left' class='text-dark'>"  . $row['NOMBRE'] . " </div></td>";

					//if($row['OBSERVATIONS']=="") 
					//	echo "<td bgcolor='#EEEEEE'><div align='center' class='tooltip' id='tooltip_" .$i. "'></div></td>";
					//else
					//	echo "<td bgcolor='#EEEEEE'><div align='center' class='tooltip' id='tooltip_" .$i. "'><img src='../images/nota.png'><span class='tooltip' style='display: none;'>Comentario: ".$row['OBSERVATIONS']. "</span></div></td>";

					echo "</tr>";
					$i = $i + 1;
				}
				echo "<tbody>";
				echo "</table>";


				sqlsrv_free_stmt($result);
				sqlsrv_close($conn);

				echo "</center>";
				echo "</div";
				echo "<div id='dialog'></div>";
				echo "</body>";
				echo "</html>";

				//mysqli_close($con);
				?>

		</div>
	</div>
</div>
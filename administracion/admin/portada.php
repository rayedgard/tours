 <?php
//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
$td=$_GET['td'];



//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");
?>


<div id="element-box">
  <div class="m" >
<table class="adminform">
						<tr>
							<td width="55%" valign="top">
									<div id="cpanel">
				<div style="float:left;">
			<div class="icon">
            <a href="principal.php?p=1&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">
					<img src="../imagen/video.png" alt="Gestion de Tiendas"  />					<span>Gestión de Videos</span></a>
			</div>
		</div>
				<div style="float:left;">
				  <div class="icon">
                  <a href="principal.php?p=2&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">
					<img src="../imagen/noticias.png" alt="Gestion de Clientes"  />					<span>Gestión de Noticias</span></a>
        </div>
		</div>
				<div style="float:left;">
			<div class="icon">
				<a href="principal.php?p=3&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">
					<img src="../imagen/publicidad.png" alt="Gestion de Proveedores"  />					<span>Gestión de Publicidad</span></a>
			</div>
		</div>
        
        <div style="float:left;">
			<div class="icon">
				<a href="principal.php?p=4&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">
					<img src="../imagen/usuario.png" alt="Añadir un nuevo artículo"  />					<span>Gestión de Usuarios</span></a>
			</div>
		</div>
        
				<div style="float:left;">
			<div class="icon"></div>
		</div>
				<div style="float:left;">
			<div class="icon">
				<a href="principal.php?p=5&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">
					<img src="../imagen/perfil.png" alt="Gestión de Productos" />					<span>Gestión de Perfiles</span></a>
			</div>
		</div>
				<div style="float:left;">
				  <div class="icon">
				<a href="principal.php?p=6&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">
					<img src="../imagen/paquetes.png" alt="Gestión de Compras"  />					<span>Gestión de Paquetes</span></a>
			</div>
		</div>
        
        
        
				<div style="float:left;">
			<div class="icon">
				<a href="principal.php?p=7&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">
					<img src="../imagen/destinos.png" alt="Gestión de Compras" />					<span>Gestión de Destinos</span></a>
			</div>
		</div>
        
        
        
        		<div style="float:left;">
			<div class="icon">
				<a href="principal.php?p=8&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">
					<img src="../imagen/fotos.png" alt="Reportes"   />					<span>Gestión de Fotos</span></a>
			</div>
		</div>
        
        
        
        <?php
        
  /*      <div style="float:left;">
				  <div class="icon">
				<a href="principal.php?p=8&q=1">
					<img src="../imagen/publicidad.png" alt="Gestor de Publicidad"  />					<span>Gestor de Publicidades</span></a>
			</div>
		</div>
        <div style="float:left;">
				  <div class="icon">
				<a href="principal.php?p=9&q=1">
					<img src="../imagen/documento.png" alt="Gestor de Documentos"  />					<span>Gestor de Documentos</span></a>
			</div>
		</div>
         <div style="float:left;">
			<div class="icon">
				<a href="principal.php?p=10&q=1">
					<img src="../imagen/perfil.png" alt="Añadir un nuevo artículo"  />					<span>Perfil del Usuario</span></a>
			</div>
		</div>
        	</div>*/
            
            ?>
							</td>
							<td width="45%" valign="top">
								<div id="content-pane" class="pane-sliders"><div class="panel"><h3 class="jpane-toggler title" id="cpanel-panel-logged"><span>INFORMATIC TECHNOLOGY DEVELOPMENT CORPORATION S.A.</span></h3><div class="jpane-slider content">
<form method="post" action="../index.php?option=com_users">
	<table class="adminlist">
		<thead>
			<tr>
				<td class="title">
					<strong>ITDECSA es una empresa peruana que brinda servicios de desarrollo de sistemas de software, contamos con la tecnología de vanguardia y con el personal especializado en cada área, para brindar propuestas innovadoras de acuerdo con cada una de las necesidades de nuestros clientes. A lo largo de nuestra trayectoria ITDECSA se ha especializado en las siguientes aéreas
<ul>
<li>Desarrollo de sistemas de software a medida </li>
<li>Optimización de metodologías de trabajo para mineria</li>
<li>Seguridad informática</li>
<li>Sistemas de seguridad y videovigilancia CCTV</li>
<li>Sistemas de control de asistencia al personal</li>
<li>Desarrollo de sistemas web</li>
<li>Sistemas integrados de automatización(domótica) </li>
</ul>
                    </strong>
				</td>
			</tr>
		</thead>
	</table>
	</form>
</div></div><div class="panel"><h3 class="jpane-toggler title" id="cpanel-panel-popular"><span>MISION</span></h3><div class="jpane-slider content">
<table class="adminlist">
<tr>
	<td class="title">
		<strong>Somos una empresa dedicada al desarrollo de tecnologías informáticas de última generación, satisfaciendo las necesidades de nuestros clientes. Somos altamente efectivos, sofisticados y oportunos en nuestros servicios. Y nuestros productos son utilizados como herramientas de apoyo en la toma de decisiones y mejora de procesos.</strong>
	</td>
	</tr>
</table>
</div></div><div class="panel"><h3 class="jpane-toggler title" id="cpanel-panel-latest"><span>VISION</span></h3><div class="jpane-slider content">
<table class="adminlist">
<tr>
	<td class="title">
		<strong>Somos una empresa altamente competitiva y rentable, que ofrece a sus clientes servicios informáticos de alta calidad, desarrollados por personal y proveedores líderes en el mercado, comprometidos con las necesidades más exigentes de nuestros clientes, trabajamos con integridad, compromiso, responsabilidad, honestidad, proactividad y seriedad, reconocidos por nuestros clientes y proveedores como una empresa líder en el mercado.</strong>
	</td>
	</tr>
</table>
</div></div></div>
							</td>
						</tr>
						</table>
						<div class="clr"></div>
						<noscript>
						</noscript>
				    </div>
				</div>
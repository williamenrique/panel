<?php head($data);$dataUser = data($_SESSION['idUser']);?>
<div class="container">
		<div class="heading">
		<h2 class="title"><span>D</span>atos personales</h2>
	</div>

	<div class="box-perfil">
		<div class="box-img">
			<div class="box-img-profile">
				<h5 class="title-profile">Imgen de perfil</h5>
				<form  class="formImg">
					<input type="file" id="file" name="file" accept="image/*">
					<span class="search">
						<i class="fa-solid fa-camera"></i>
					</span>
						
					<?php if($dataUser['imagen'] != ''){?>
					<div id="preview-images">
						<div class="thumbnail 0" data-id="0" style="background-image : url('<?= $dataUser['imgUser']?>')"></div>
					</div>
					<?php }else{?>
						<div id="preview-images"></div>
					<?php }?>
				</form>
				<button class="btn btnUpImg" type="button">
					<i class="fa-solid fa-arrows-spin"></i>actualizar
				</button>
			</div>
		</div>
		<div class="box-datos">
			<section class="box-form">
				<h5 class="title-box">Formulario de actualizacion de datos</h5>
				<form class="form-profile">
					<input type="hidden" value="<?= $_SESSION['idUser']?>" name="intUserId" id="intUserId">
					<!-- <section class="box-perfil data1"> -->
						<div class="box-input">
							<input type="text" id="txtCiProfile" name="txtCiProfile" required>
							<label class="label" for="txtCiProfile">
								<span class="span">C.I</span>
							</label>
						</div>
						<div class="box-input">
							<input type="text" id="txtEmailProfile" name="txtEmailProfile" required>
							<label class="label" for="txtEmailProfile">
								<span class="span"> Email</span>
							</label>
						</div>
						<div class="box-input">
							<input type="text" id="txtNombreProfile" name="txtNombreProfile" required>
							<label class="label" for="txtNombreProfile">
								<span class="span">Nombre</span>
							</label>
						</div>
						<div class="box-input">
							<input type="text" id="txtApellidoProfile" name="txtApellidoProfile" required>
							<label class="label" for="txtApellidoProfile">
								<span class="span"> Apelido</span>
							</label>
						</div>
						<div class="box-input">
							<input type="text" id="txtTlfProfile" name="txtTlfProfile" required>
							<label class="label" for="txtTlfProfile">
								<span class="span"> Telefono</span>
							</label>
						</div>
						<div class="box-input">
							<input type="text" id="txtCdPostal" name="txtCdPostal" required>
							<label class="label" for="txtCdPostal">
								<span class="span"> codigo postal</span>
							</label>
						</div>
					<!-- </section> -->
					<!-- <section class="box-perfil data2"> -->
						<select name="listState" id="listState" class="listState">
							<option value="0">Estado</option>
						</select>
						<select name="listCiudad" id="listCiudad" class="listCiudad">
							<option value="0">Ciudad</option>
						</select>
						<div class="box-input direc">
							<input type="text" id="txtDireccion" name="txtDireccion" required>
							<label class="label" for="txtDireccion">
								<span class="span"> Direccion</span>
							</label>
						</div>
					<!-- </section> -->

				</form>
				<button type="button" class="btn btnPerfil">
					<i class="fa-solid fa-arrows-spin"></i>actualizar
				</button>
			</section>
		</div>
	</div>
	<div class="box-user"></div>
</div>


<?php footer($data) ?>
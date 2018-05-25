<form class="buzon">
  <fieldset>
    <legend>
      <hgroup>
        <h3><i class="far fa-envelope"></i>Buzón<br />Ciudadano</h3>
        <h4>¡Quiero escucharte!</h4>
      </hgroup>
      <p>Comparte conmigo los problemas en tu comunidad y/o las propuestas e ideas para construir un <b>#CorregidoraPosible.</b></p>
    </legend>
    <input type="email" name="correo" id="correo" placeholder="correo electrónico" class="required">
    <input type="text" name="nombre" id="nombre" placeholder="nombre (opcional)" maxlength="50">
    <textarea name="mensaje" id="mensaje" rows="3" placeholder="propuesta/solicitud" class="required" maxlength="500"></textarea>
    <button type="submit" name="send" value="enviar" class="send">enviar</button>
    <input type="hidden" id="cat" name="cat" value="buzon">
  </fieldset>
</form>

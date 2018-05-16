<form class="sign-in">
  <fieldset>
    <legend>
      <i class="fas fa-bullhorn"></i>
      <h3>¡Participa!</h3>
      <p>
        Si compartes nuestra visión de un mejor Corregidora, ¡Súmate a la causa! <br />Regístrate como simpatizante y participa en las acciones que se realizarán en tu comunidad.Con tu apoyo ganaremos.</p>
    </legend>
    <input type="text" name="nombre" id="nombre" placeholder="nombre" class="required">
    <input type="email" name="correo" id="correo" placeholder="correo electrónico" class="required">
    <input type="tel" name="telefono" id="telefono" placeholder="teléfono (whatsapp)" class="required">
    <input type="number" name="edad" id="edad" placeholder="edad" class="required" /><span>años</span>
    <label for="edad">Por ley debes tener al menos 18 años para poder registrarte como simpatizante.</label>
    <select name="comunidad" id="comunidad" class="required">
      <option class="placeholder" value="">comunidad</option>
      <option>Candiles</option>
      <option>Los Ángeles</option>
      <option>Villa del Pueblito</option>
      <option>Los Olvera</option>
      <option>San José de los Olvera</option>
      <option>Santa Bárbarara</option>
      <option>Tejeda</option>
    </select>
    <button type="submit" name="send" value="enviar" class="send">enviar</button>
    <input type="hidden" id="cat" name="cat" value="registro">
  </fieldset>
</form>

  <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                
            <div class="account-wall">
                    <h1 class="text-center login-title">JSON Web Token</h1>                      
              <form id="form-login" class="form-signin" action="login/validar" method="post">
                                                  
                <div class="form-group required">
                  <input type="email" id="user" class="form-control" name="user" placeholder="Ingrese su Usuario" 0="autofocus" required>
                  <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group required">
                  <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" required>
                  <p class="help-block help-block-error"></p>
                </div>                
                      <input type="button" class="btn btn-lg btn-primary btn-block" name="botonLogin" id ="botonLogin" value = "Login">                                 
              </form>                
            </div>

            <br>
            <div id = "token">
              <label>Su token generado es </label>
              <div id = "valor_token"></div>
            </div>
                
            </div>
        </div>
    
    </div> <!-- fin container -->
  </div> <!-- fin container -->

<script>
  
  $('#token').hide();
  
  $('#botonLogin').click(function(event) {
      $('#token').hide();
      $('#valor_token').text('');

      $.ajax({
        url: '<?php base_url();?>login',
              type: 'POST',
              data: {
                      user: $('#user').val(),
                      password: $('#password').val(),                         
                    },
      })
      .done(function(resp) {
        
          alert(resp.message);
          $('#token').show();
          $('#valor_token').text(resp.token);
        
      })
      .fail(function(resp) {
        alert(resp.responseJSON.message);
      });    
    
  });

</script>

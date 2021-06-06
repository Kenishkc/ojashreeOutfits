
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" method="POST" action="{{ route('login') }}">
            @csrf
             <div class="form-group ">

            <label for="">Email address<span>*</span></label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Username or email"name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
             @error('email')
               <span class="invalid-feedback" role="alert">
                  <strong class="text-danger">{{ $message }}</strong>
                 </span>
             @enderror
             </div>  

             <div class="form-group ">
            <label for="">Password<span>*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
               <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
               </span>
           @enderror
             </div>
             
            <button class="aa-browse-btn" type="submit">Login</button>
            
            <label for="rememberme" class="rememberme">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
             Remember me </label>
           
           @if (Route::has('password.request'))
            <p class="aa-lost-password">
              <a href="{{ route('password.request') }}">Lost your password?</a>
            </p>
            @endif
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  